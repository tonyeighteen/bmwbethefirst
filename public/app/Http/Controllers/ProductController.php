<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function Index($slug){
        $list_product = DB::table("product")
            ->get();

        $product = DB::table("product")
            ->where("slug","=",$slug)
            ->first();
        if (!$product)   abort(404);
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $product->youtube, $matches);
        $product->youtubeId = $matches[1];
        $product->featureArray = json_decode($product->feature);
        $product->designArray = json_decode($product->design);
        $product->operateArray = json_decode($product->operate);
        $product->technologyArray = json_decode($product->technology);

         return view("product",[
            "product"=>$product,
            "list_product"=>$list_product,
        ]);


    }
}
