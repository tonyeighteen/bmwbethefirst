<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function Index()
    {
        return view("admin.model");
    }

    public function Home()
    {
        return view("admin.model");
    }

    public function Blog()
    {
        return view("admin.blog");
    }

    public function Model()
    {
        return view("admin.model");
    }

    public function Account()
    {
        return view("admin.account");
    }
    public function Request(){

        return view("admin.request");
    }
    public function GetRequest(){
        try {
            $result = DB::table("notification")
                ->orderBy("id","DESC")
                ->limit(500)
                ->get();
            foreach ($result as $item){
                if ($item->created_at)   $item->created_at = Carbon::parse($item->created_at)->tz("Asia/Ho_Chi_Minh")->format("Y-m-d H:i:s");
            }
            return response()->json([
                "status" => true,
                "data" => $result
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "data" => "Internal Error"
            ]);
        }
    }
    public function AddOrUpdateProduct(Request $request)
    {
        try {
            $id = $request->post("id");
            $slug = $this->slugify($request->post("slug"));
            $brand = $request->post("brand");
            $short_model = $request->post("short_model");
            $long_model = $request->post("long_model");
            $price = $request->post("price");
            $slogan = $request->post("slogan");
            $youtube = $request->post("youtube");
            $images = $request->post("images");
            $thumbnail = $request->post("thumbnail");
            $feature = json_decode($request->post("feature", null), true);
            $design = json_decode($request->post("design", null), true);
            $operate = json_decode($request->post("operate", null), true);
            $technology = json_decode($request->post("technology", null), true);

            if (!$slug || !$brand || !$short_model || !$long_model ||!$slogan || !$youtube || !$images
                || !$thumbnail || !$feature || !$design || !$operate || !$technology || !$price
            ) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin, vui l??ng ki???m tra l???i.");

            $check = false;
            foreach ($feature as $item) {
                if ($item["title"] && $item["content"] && $item["images"]) $check = true;
            }
            if (!$check) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin ?????c ??i???m n???i b???t, vui l??ng ki???m tra l???i.");
            if (!$design["outside"]["title"] || !$design["outside"]["content"] || !$design["outside"]["images"]) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin Thi???t k???, vui l??ng ki???m tra l???i.");
            if (!$design["inside"]["title"] || !$design["inside"]["content"] || !$design["inside"]["images"]) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin Thi???t k???, vui l??ng ki???m tra l???i.");
            if (!$operate["images"]) throw new \Exception("B???n ch??a ch???n h??nh ???nh V???n h??nh, vui l??ng ki???m tra l???i.");
            $check = false;
            foreach ($operate["list"] as $item) {
                if ($item["title"] && $item["content"]) $check = true;
            }
            if (!$check) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin V???n h??nh, vui l??ng ki???m tra l???i.");

            $check = false;
            foreach ($technology as $item) {
                if ($item["title"] && $item["content"] && $item["images"]) $check = true;
            }
            if (!$check) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin C??ng ngh???, vui l??ng ki???m tra l???i.");
            $checkSlug = DB::table("product")
                ->where("slug","=",$slug)
                ->first();
            if ($checkSlug && $checkSlug->id != $id) throw new \Exception("???? t???n t???i ?????a ch??? n??y r???i, vui l??ng thay ?????i sang ?????a ch??? kh??c.");
            if ($id) {

                $check = DB::table("product")
                    ->where("id", "=", $id)
                    ->first();
                if (!$check) throw new \Exception("Th??ng tin n??y kh??ng t???n t???i");


                $result = DB::table("product")
                    ->where("id", "=", $id)
                    ->update([
                        "slug" => $slug,
                        "brand" => $brand,
                        "short_model" => $short_model,
                        "long_model" => $long_model,
                        "price" => $price,
                        "slogan" => $slogan,
                        "youtube" => $youtube,
                        "images" => $images,
                        "thumbnail" => $thumbnail,
                        "feature" => json_encode($feature),
                        "design" => json_encode($design),
                        "operate" => json_encode($operate),
                        "technology" => json_encode($technology),
                        "updated_at"=>\Carbon\Carbon::now("UTC")
                    ]);

            } else {

                $result = DB::table("product")
                    ->insertGetId([
                        "slug" => $slug,
                        "brand" => $brand,
                        "short_model" => $short_model,
                        "long_model" => $long_model,
                        "price" => $price,
                        "slogan" => $slogan,
                        "youtube" => $youtube,
                        "images" => $images,
                        "thumbnail" => $thumbnail,
                        "feature" => json_encode($feature),
                        "design" => json_encode($design),
                        "operate" => json_encode($operate),
                        "technology" => json_encode($technology),
                        "created_at"=>\Carbon\Carbon::now("UTC")
                    ]);
            }
            return response()->json([
                "status" => true
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "message" => $exception->getMessage(),
            ]);
        }
    }

    public function AddOrUpdateBlog(Request $request)
    {
        try {
            $id = $request->post("id");
            $title = $request->post("title");
            $content = $request->post("content");
            $images = $request->post("images");
            $newspaper = $request->post("newspaper");
            $logo_newspaper = $request->post("logo_newspaper");
            $url = $request->post("url");

            if (filter_var($url, FILTER_VALIDATE_URL) == false) throw new \Exception("Sai th??ng tin ?????a ch???, vui l??ng ki???m tra l???i.");
            if (!$title || !$content || !$images || !$newspaper || !$logo_newspaper || !$url) throw new \Exception("B???n ch??a nh???p ?????y ????? th??ng tin, vui l??ng ki???m tra l???i.");
            if ($id) {
                $check = DB::table("blog")
                    ->where("id", "=", $id)
                    ->first();
                if (!$check) throw new \Exception("Th??ng tin n??y kh??ng t???n t???i");
                $result = DB::table("blog")
                    ->where("id", "=", $id)
                    ->update([
                        "title" => $title,
                        "content" => $content,
                        "images" => $images,
                        "newspaper" => $newspaper,
                        "logo_newspaper" => $logo_newspaper,
                        "url" => $url,
                        "updated_at"=>\Carbon\Carbon::now("UTC")
                    ]);

            } else {
                $result = DB::table("blog")
                    ->insertGetId([
                        "title" => $title,
                        "content" => $content,
                        "images" => $images,
                        "newspaper" => $newspaper,
                        "logo_newspaper" => $logo_newspaper,
                        "url" => $url,
                        "created_at"=>\Carbon\Carbon::now("UTC")
                    ]);
            }
            return response()->json([
                "status" => true
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "message" => $exception->getMessage()
            ]);
        }
    }

    public function GetProduct()
    {
        try {
            $result = DB::table("product")
                ->get();
            return response()->json([
                "status" => true,
                "data" => $result
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "data" => "Internal Error"
            ]);
        }

    }

    public function GetBlog()
    {
        try {
            $result = DB::table("blog")
                ->get();
            return response()->json([
                "status" => true,
                "data" => $result
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "data" => "Internal Error"
            ]);
        }

    }

    public function DeleteProduct(Request $request)
    {
        $id = $request->post("id");
        try {
            $check = DB::table("product")
                ->where("id", "=", $id)
                ->first();
            if (!$check) throw new \Exception("Kh??ng t??m th???y s???n ph???m n??y!");
            $result = DB::table("product")
                ->where("id", "=", $id)
                ->delete();
            return response()->json([
                "status" => true,
                "data" => $result
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "data" => $exception->getMessage()
            ]);
        }

    }

    public function DeleteBlog(Request $request)
    {
        $id = $request->post("id");
        try {
            $check = DB::table("blog")
                ->where("id", "=", $id)
                ->first();
            if (!$check) throw new \Exception("Kh??ng t??m th???y s???n ph???m n??y!");
            $result = DB::table("blog")
                ->where("id", "=", $id)
                ->delete();
            return response()->json([
                "status" => true,
                "data" => $result
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "data" => $exception->getMessage()
            ]);
        }

    }

    public function ChangePassword(Request $request)
    {
        try {

            $current_password = $request->post("current_password");
            $new_pasword = $request->post("new_password");
            $renew_pasword = $request->post("renew_password");
            $username = session("account");
            if ($new_pasword != $renew_pasword) throw new \Exception("M???t kh???u m???i kh??ng tr??ng nhau");
            if (!$username) throw new \Exception("Kh??ng t??m th???y t??i kho???n");
            if (!$new_pasword) throw new \Exception("M???t kh???u m???i kh??ng ???????c ????? tr???ng");
            if (!$current_password) throw new \Exception("M???t kh???u c?? kh??ng ???????c ????? tr???ng");
            $check = DB::table("account")
                ->where("username", "=", $username)
                ->first();
            if (!$check) throw new \Exception("Kh??ng t??m th???y t??i kho???n");
            if (!Hash::check($current_password,$check->password)) throw new \Exception("M???t kh???u c?? kh??ng ????ng");
            $result = DB::table("account")
                ->where("username", "=", $username)
                ->update([
                    "password" => Hash::make($new_pasword)
                ]);
            session(["account"=>null]);
            return response()->json([
                "status" => true,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "message" => $exception->getMessage()
            ]);
        }
    }

    public function Logout()
    {
        session(["account"=>null]);
        return redirect()->route("login");
    }

    public function Login(Request $request)
    {
        $username = $request->post("username");
        $password = $request->post("password");
        $error = null;

        if (!$username && !$password) {
            $error = "";
            return view("admin.login", [
                "error" => $error
            ]);
        }
        if (!$username || !$password) {
            $error = "Sai t??n t??i kho???n ho???c m???t kh???u";
            return view("admin.login", [
                "error" => $error
            ]);
        }
        $check = DB::table("account")
            ->where("username", "=", $username)
            ->first();
        if (!$check) {
            $error = "Sai t??n t??i kho???n ho???c m???t kh???u";
            return view("admin.login", [
                "error" => $error
            ]);
        }

        if (!Hash::check($password, $check->password)) {
            $error = "Sai t??n t??i kho???n ho???c m???t kh???u";
            return view("admin.login", [
                "error" => $error
            ]);
        } else {
            session([
                "account" => $username
            ]);
            return redirect()->route("admin.home");
        }
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function UploadImage(Request $request)
    {
        try {
            $data = base64_decode($request->post("data"));
            if (!$data) throw new \Exception("Kh??ng c?? th??ng tin ????? upload.");
            $filename = $this->quickRandom(16) . ".jpg";
            if (!Storage::disk('public_uploads')->put($filename, $data)) {
                return response()->json([
                    "status" => false,
                    "message" => "Kh??ng th??? upload t???p tin n??y."
                ]);
            } else {
                return response()->json([
                    "status" => true,
                    "data" => "/uploads/" . $filename
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "message" => $exception->getMessage()
            ]);
        }

    }

    public static function slugify($text)
    {

        $replace = [
            '&lt;' => '', '&gt;' => '', '&#039;' => '', '&amp;' => '',
            '&quot;' => '', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'Ae',
            '&Auml;' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'Ae',
            '??' => 'C', '??' => 'C', '??' => 'C', '??' => 'C', '??' => 'C', '??' => 'D', '??' => 'D',
            '??' => 'D', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E',
            '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'G', '??' => 'G',
            '??' => 'G', '??' => 'G', '??' => 'H', '??' => 'H', '??' => 'I', '??' => 'I',
            '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I',
            '??' => 'I', '??' => 'IJ', '??' => 'J', '??' => 'K', '??' => 'K', '??' => 'K',
            '??' => 'K', '??' => 'K', '??' => 'K', '??' => 'N', '??' => 'N', '??' => 'N',
            '??' => 'N', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O',
            '??' => 'Oe', '&Ouml;' => 'Oe', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O',
            '??' => 'OE', '??' => 'R', '??' => 'R', '??' => 'R', '??' => 'S', '??' => 'S',
            '??' => 'S', '??' => 'S', '??' => 'S', '??' => 'T', '??' => 'T', '??' => 'T',
            '??' => 'T', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'Ue', '??' => 'U',
            '&Uuml;' => 'Ue', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U',
            '??' => 'W', '??' => 'Y', '??' => 'Y', '??' => 'Y', '??' => 'Z', '??' => 'Z',
            '??' => 'Z', '??' => 'T', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a',
            '??' => 'ae', '&auml;' => 'ae', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a',
            '??' => 'ae', '??' => 'c', '??' => 'c', '??' => 'c', '??' => 'c', '??' => 'c',
            '??' => 'd', '??' => 'd', '??' => 'd', '??' => 'e', '??' => 'e', '??' => 'e',
            '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e',
            '??' => 'f', '??' => 'g', '??' => 'g', '??' => 'g', '??' => 'g', '??' => 'h',
            '??' => 'h', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i',
            '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'ij', '??' => 'j',
            '??' => 'k', '??' => 'k', '??' => 'l', '??' => 'l', '??' => 'l', '??' => 'l',
            '??' => 'l', '??' => 'n', '??' => 'n', '??' => 'n', '??' => 'n', '??' => 'n',
            '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'oe',
            '&ouml;' => 'oe', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'oe',
            '??' => 'r', '??' => 'r', '??' => 'r', '??' => 's', '??' => 'u', '??' => 'u',
            '??' => 'u', '??' => 'ue', '??' => 'u', '&uuml;' => 'ue', '??' => 'u', '??' => 'u',
            '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'w', '??' => 'y', '??' => 'y',
            '??' => 'y', '??' => 'z', '??' => 'z', '??' => 'z', '??' => 't', '??' => 'ss',
            '??' => 'ss', '????' => 'iy', '??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G',
            '??' => 'D', '??' => 'E', '??' => 'YO', '??' => 'ZH', '??' => 'Z', '??' => 'I',
            '??' => 'Y', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => 'O',
            '??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F',
            '??' => 'H', '??' => 'C', '??' => 'CH', '??' => 'SH', '??' => 'SCH', '??' => '',
            '??' => 'Y', '??' => '', '??' => 'E', '??' => 'YU', '??' => 'YA', '??' => 'a',
            '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'yo',
            '??' => 'zh', '??' => 'z', '??' => 'i', '??' => 'y', '??' => 'k', '??' => 'l',
            '??' => 'm', '??' => 'n', '??' => 'o', '??' => 'p', '??' => 'r', '??' => 's',
            '??' => 't', '??' => 'u', '??' => 'f', '??' => 'h', '??' => 'c', '??' => 'ch',
            '??' => 'sh', '??' => 'sch', '??' => '', '??' => 'y', '??' => '', '??' => 'e',
            '??' => 'yu', '??' => 'ya'
        ];

        // make a human readable string
        $text = strtr($text, $replace);

        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // remove unwanted characters
        $text = preg_replace('~[^-\w.]+~', '', $text);

        $text = strtolower($text);

        return $text;
    }
}
