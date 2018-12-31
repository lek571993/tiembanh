<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Http\Controllers\Controller;
use Request;
use DB;
use Cart;

class CartController extends Controller
{
    public function addCart($id) {
        $product_add = DB::table('products')->where('id', $id)->first();
//        echo "<pre>";
//        print_r($product_add);
//        echo "</pre>";
//        exit;
        Cart::add(['id'=>$product_add->id, 'name'=>$product_add->name, 'qty'=>1, 'price'=>$product_add->price, 'options'=>['image'=>$product_add->image]]);
        echo "<script>
            alert('Sản phẩm đã thêm vào giỏ hàng');
            window.location = '".route('front.index')."';
        </script>";
    }

    public function showCart() {
        return view('frontend.pages.shopping_cart');
    }

    public function delCart($id) {
        Cart::remove($id);
        return redirect()->back();
    }

    public function updateCart() {
        if (Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id, $qty);

            echo "Oke";
        }
    }
}
