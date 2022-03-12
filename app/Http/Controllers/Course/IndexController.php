<?php

namespace App\Http\Controllers\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
class IndexController extends Controller
{
    public function index()
    {
        return view('course.index');
    }
    public function data(){
        $data = array(
            [
                "category_id"=> 1,
                "name"=> "Corona Mexico",
                "id"=> 5,
                "price_original"=> 240000,
                "price"=> 200000,
                "discount"=> 20,
                "unit"=> "Block",
                "conversion_unit"=> "Chai",
                "conversion_value"=> 6,
                "quantity_whole"=> 6,
                "price_whole"=> 220000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 1,
                "name"=> "Bia SaiGon",
                "id"=> 1,
                "price_original"=> 300000,
                "price"=> 250000,
                "discount"=> 20,
                "unit"=> "Thùng",
                "conversion_unit"=> "Lon",
                "conversion_value"=> 24,
                "quantity_whole"=> 10,
                "price_whole"=> 280000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 1,
                "name"=> "Sting",
                "id"=> 2,
                "price_original"=> 60000,
                "price"=> 30000,
                "discount"=> 10,
                "unit"=> "Block",
                "conversion_unit"=> "Chai",
                "conversion_value"=> 6,
                "quantity_whole"=> 6,
                "price_whole"=> 15000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 1,
                "name"=> "Volka",
                "id"=> 3,
                "price_original"=> 3500000,
                "price"=> 3000000,
                "discount"=> 10,
                "unit"=> "Block",
                "conversion_unit"=> "Chai",
                "conversion_value"=> 6,
                "quantity_whole"=> 6,
                "price_whole"=> 3200000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 1,
                "name"=> "Budweiser",
                "id"=> 4,
                "price_original"=> 450000,
                "price"=> 350000,
                "discount"=> 20,
                "unit"=> "Thùng",
                "conversion_unit"=> "Lon",
                "conversion_value"=> 24,
                "quantity_whole"=> 10,
                "price_whole"=> 400000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 2,
                "name"=> "Búp bê",
                "id"=> 5,
                "price_original"=> 240000,
                "price"=> 200000,
                "discount"=> 20,
                "unit"=> "Block",
                "conversion_unit"=> "Chai",
                "conversion_value"=> 6,
                "quantity_whole"=> 6,
                "price_whole"=> 220000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 2,
                "name"=> "Xe điều khiển",
                "id"=> 1,
                "price_original"=> 250000,
                "price"=> 300000,
                "discount"=> 20,
                "unit"=> "Thùng",
                "conversion_unit"=> "Lon",
                "conversion_value"=> 24,
                "quantity_whole"=> 10,
                "price_whole"=> 280000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 2,
                "name"=> "Siêu nhân",
                "id"=> 2,
                "price_original"=> 40000,
                "price"=> 60000,
                "discount"=> 10,
                "unit"=> "Block",
                "conversion_unit"=> "Chai",
                "conversion_value"=> 6,
                "quantity_whole"=> 6,
                "price_whole"=> 50000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 2,
                "name"=> "Gấu bông",
                "id"=> 3,
                "price_original"=> 3000000,
                "price"=> 3500000,
                "discount"=> 10,
                "unit"=> "Block",
                "conversion_unit"=> "Chai",
                "conversion_value"=> 6,
                "quantity_whole"=> 6,
                "price_whole"=> 3200000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 2,
                "name"=> "Bóng",
                "id"=> 4,
                "price_original"=> 350000,
                "price"=> 450000,
                "discount"=> 20,
                "unit"=> "Thùng",
                "conversion_unit"=> "Lon",
                "conversion_value"=> 24,
                "quantity_whole"=> 10,
                "price_whole"=> 400000,
                "inventor"=> 50
            ],
            [
                "category_id"=> 2,
                "name"=> "Bóng bay",
                "id"=> 4,
                "price_original"=> 350000,
                "price"=> 450000,
                "discount"=> 20,
                "unit"=> "Thùng",
                "conversion_unit"=> "Lon",
                "conversion_value"=> 24,
                "quantity_whole"=> 10,
                "price_whole"=> 400000,
                "inventor"=> 50
            ]
        );

        return response()->json($data);
    }
    public function addToCart(Request $request){
        // Session::push('cart',[
        //         "id" => $request->id,
        //         "qty" => $request->qty, 
        //         "name" => $request->name, 
        //         "price_original" => $request->price_original, 
        //         "price" => $request->price,
        //         "discount" => $request->discount,
        //         "unit" => $request->unit,
        //         "conversion_unit" => $request->conversion_unit,
        //         "conversion_value" => $request->conversion_value,
        //         "quantity_whole" => $request->quantity_whole,
        //         "price_whole" => $request->price_whole,
        //         "inventor" => $request->inventor,
        //     ]
        // );
        $cookie = Cookie::get('product');
        if(empty($cookie)){
            $cookie = [];
        }else{
            $cookie = json_decode(Cookie::get('product'),true);
        }
        $product = array(
            "id" => $request->id,
            "qty" => $request->qty, 
            "name" => $request->name, 
            "price_original" => $request->price_original, 
            "price" => $request->price,
            "discount" => $request->discount,
            "unit" => $request->unit,
            "conversion_unit" => $request->conversion_unit,
            "conversion_value" => $request->conversion_value,
            "quantity_whole" => $request->quantity_whole,
            "price_whole" => $request->price_whole,
            "inventor" => $request->inventor,

        );
    
        array_push($cookie, $product);
        Cookie::queue('product', json_encode($cookie), 20);
        
    }
    public function viewCart(){
        return view('course.cart');
    }
    public function staff(){
        $data = array(
            [
                "stt"=> 1,
                "name"=> "Thầy ông nội",
                "phone"=> "0909090909",
                "email"=> "fake@con.vn",
                "gender"=> "Nam",
                "image"=> "https://toigingiuvedep.vn/wp-content/uploads/2021/06/hinh-anh-anime-cute.jpg",
            ],
            [
                "stt" => 2,
                "name"=> "Võ Thị Diễm My",
                "phone" => "0909090909",
                "email" => "gmai",
                "gender"=> "Nữ",
                "image"=> "https://i1.taimienphi.vn/tmp/cf/aut/hinh-anh-nguoi-mau.jpg",
            ],
            [
                "stt"=> 3,
                "name"=> "Mỹ Duyên",
                "phone"=> "0909090909",
                "email"=> "fake@con.vn",
                "gender"=> "Nữ",
                "image"=> "https://luv.vn/wp-content/uploads/2021/09/hinh-anh-nguoi-mau-lam-hinh-nen-dien-thoai-1.jpg",
            ],
            [
                "stt"=> 4,
                "name"=> "Huỳnh Thảo Hoài",
                "phone"=> "0909090909",
                "email"=> "fake@con.vn",
                "gender"=> "Nữ",
                "image"=> "https://luv.vn/wp-content/uploads/2021/09/hinh-anh-nguoi-mau-lam-hinh-nen-dien-thoai-3.jpg",
            ],
            [
                "stt"=> 5,
                "name"=> "OK baby",
                "phone"=> "0909090909",
                "email"=> "fake@con.vn",
                "gender"=> "Nữ",
                "image"=> "https://luv.vn/wp-content/uploads/2021/09/hinh-anh-nguoi-mau-lam-hinh-nen-dien-thoai-3.jpg",
            ]
        );

        return response()->json($data);
    }
    
}
