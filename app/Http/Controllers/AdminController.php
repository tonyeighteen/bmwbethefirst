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
            ) throw new \Exception("Bạn chưa nhập đầy đủ thông tin, vui lòng kiểm tra lại.");

            $check = false;
            foreach ($feature as $item) {
                if ($item["title"] && $item["content"] && $item["images"]) $check = true;
            }
            if (!$check) throw new \Exception("Bạn chưa nhập đầy đủ thông tin Đặc điểm nổi bật, vui lòng kiểm tra lại.");
            if (!$design["outside"]["title"] || !$design["outside"]["content"] || !$design["outside"]["images"]) throw new \Exception("Bạn chưa nhập đầy đủ thông tin Thiết kế, vui lòng kiểm tra lại.");
            if (!$design["inside"]["title"] || !$design["inside"]["content"] || !$design["inside"]["images"]) throw new \Exception("Bạn chưa nhập đầy đủ thông tin Thiết kế, vui lòng kiểm tra lại.");
            if (!$operate["images"]) throw new \Exception("Bạn chưa chọn hình ảnh Vận hành, vui lòng kiểm tra lại.");
            $check = false;
            foreach ($operate["list"] as $item) {
                if ($item["title"] && $item["content"]) $check = true;
            }
            if (!$check) throw new \Exception("Bạn chưa nhập đầy đủ thông tin Vận hành, vui lòng kiểm tra lại.");

            $check = false;
            foreach ($technology as $item) {
                if ($item["title"] && $item["content"] && $item["images"]) $check = true;
            }
            if (!$check) throw new \Exception("Bạn chưa nhập đầy đủ thông tin Công nghệ, vui lòng kiểm tra lại.");
            $checkSlug = DB::table("product")
                ->where("slug","=",$slug)
                ->first();
            if ($checkSlug && $checkSlug->id != $id) throw new \Exception("Đã tồn tại địa chỉ này rồi, vui lòng thay đổi sang địa chỉ khác.");
            if ($id) {

                $check = DB::table("product")
                    ->where("id", "=", $id)
                    ->first();
                if (!$check) throw new \Exception("Thông tin này không tồn tại");


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

            if (filter_var($url, FILTER_VALIDATE_URL) == false) throw new \Exception("Sai thông tin địa chỉ, vui lòng kiểm tra lại.");
            if (!$title || !$content || !$images || !$newspaper || !$logo_newspaper || !$url) throw new \Exception("Bạn chưa nhập đầy đủ thông tin, vui lòng kiểm tra lại.");
            if ($id) {
                $check = DB::table("blog")
                    ->where("id", "=", $id)
                    ->first();
                if (!$check) throw new \Exception("Thông tin này không tồn tại");
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
            if (!$check) throw new \Exception("Không tìm thấy sản phẩm này!");
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
            if (!$check) throw new \Exception("Không tìm thấy sản phẩm này!");
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
            if ($new_pasword != $renew_pasword) throw new \Exception("Mật khẩu mới không trùng nhau");
            if (!$username) throw new \Exception("Không tìm thấy tài khoản");
            if (!$new_pasword) throw new \Exception("Mật khẩu mới không được để trống");
            if (!$current_password) throw new \Exception("Mật khẩu cũ không được để trống");
            $check = DB::table("account")
                ->where("username", "=", $username)
                ->first();
            if (!$check) throw new \Exception("Không tìm thấy tài khoản");
            if (!Hash::check($current_password,$check->password)) throw new \Exception("Mật khẩu cũ không đúng");
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
            $error = "Sai tên tài khoản hoặc mật khẩu";
            return view("admin.login", [
                "error" => $error
            ]);
        }
        $check = DB::table("account")
            ->where("username", "=", $username)
            ->first();
        if (!$check) {
            $error = "Sai tên tài khoản hoặc mật khẩu";
            return view("admin.login", [
                "error" => $error
            ]);
        }

        if (!Hash::check($password, $check->password)) {
            $error = "Sai tên tài khoản hoặc mật khẩu";
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
            if (!$data) throw new \Exception("Không có thông tin để upload.");
            $filename = $this->quickRandom(16) . ".jpg";
            if (!Storage::disk('public_uploads')->put($filename, $data)) {
                return response()->json([
                    "status" => false,
                    "message" => "Không thể upload tập tin này."
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
            '&quot;' => '', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'Ae',
            '&Auml;' => 'A', 'Å' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Æ' => 'Ae',
            'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D',
            'Ð' => 'D', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E',
            'Ę' => 'E', 'Ě' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G',
            'Ġ' => 'G', 'Ģ' => 'G', 'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I',
            'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I',
            'İ' => 'I', 'Ĳ' => 'IJ', 'Ĵ' => 'J', 'Ķ' => 'K', 'Ł' => 'K', 'Ľ' => 'K',
            'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N',
            'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
            'Ö' => 'Oe', '&Ouml;' => 'Oe', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O', 'Ŏ' => 'O',
            'Œ' => 'OE', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Š' => 'S',
            'Ş' => 'S', 'Ŝ' => 'S', 'Ș' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
            'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'Ue', 'Ū' => 'U',
            '&Uuml;' => 'Ue', 'Ů' => 'U', 'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U',
            'Ŵ' => 'W', 'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z',
            'Ż' => 'Z', 'Þ' => 'T', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
            'ä' => 'ae', '&auml;' => 'ae', 'å' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
            'æ' => 'ae', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
            'ď' => 'd', 'đ' => 'd', 'ð' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
            'ë' => 'e', 'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e',
            'ƒ' => 'f', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h',
            'ħ' => 'h', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i',
            'ĩ' => 'i', 'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĳ' => 'ij', 'ĵ' => 'j',
            'ķ' => 'k', 'ĸ' => 'k', 'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l',
            'ŀ' => 'l', 'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n',
            'ŋ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'oe',
            '&ouml;' => 'oe', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o', 'ŏ' => 'o', 'œ' => 'oe',
            'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'š' => 's', 'ù' => 'u', 'ú' => 'u',
            'û' => 'u', 'ü' => 'ue', 'ū' => 'u', '&uuml;' => 'ue', 'ů' => 'u', 'ű' => 'u',
            'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ý' => 'y', 'ÿ' => 'y',
            'ŷ' => 'y', 'ž' => 'z', 'ż' => 'z', 'ź' => 'z', 'þ' => 't', 'ß' => 'ss',
            'ſ' => 'ss', 'ый' => 'iy', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G',
            'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I',
            'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
            'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '',
            'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',
            'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
            'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
            'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
            'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e',
            'ю' => 'yu', 'я' => 'ya'
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
