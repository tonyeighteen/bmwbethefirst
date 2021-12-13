<?php

namespace App\Http\Controllers;

use App\Mail\RequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function Index()
    {
        $product = DB::table("product")
            ->get();
        $list_product= $product;
        $blog = DB::table("blog")
            ->get();

        foreach ($product as $item) {
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $item->youtube, $matches);
            $item->youtubeId = $matches[1];
        }
        return view("home", [
            "product" => $product,
            "list_product" => $list_product,
            "blog" => $blog,
        ]);
    }

    public function RequestLetter(Request $request)
    {
        try {
        $error="";
        $name = $request->post("name");
        $phone = $request->post("phone");
        $email = $request->post("email");
        $model = $request->post("model");
        $location = $request->post("location");
        $showroom = $request->post("showroom");
        $purpose = $request->post("purpose");
        if (!$name || !$phone || !$email || !$model || !$location || !$showroom || !$purpose) $error = "Bạn chưa nhập đầy đủ thông tin";
        else {
            $db = DB::table("notification")
                ->insertGetId([
                    "name" => $name,
                    "phone" => $phone,
                    "email" => $email,
                    "model" => $model,
                    "location" => $location,
                    "showroom" => $showroom,
                    "purpose" => $purpose,
                    "created_at"=>\Carbon\Carbon::now("UTC")
                ]);
            Mail::to($email)
                ->send(new RequestMail([
                    "name" => $name,
                    "phone" => $phone,
                    "email" => $email,
                    "model" => $model,
                    "location" => $location,
                    "showroom" => $showroom,
                    "purpose" => $purpose,
                ]));
        }


          } catch (\Exception $exception) {
              $error = "Có lỗi xảy ra trong khi gửi yêu cầu của bạn, vui lòng thử lại." ;

          }
        return view("thankyou", [
            "error" => $error
        ]);
    }
}
