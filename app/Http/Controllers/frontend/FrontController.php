<?php

namespace App\Http\Controllers\frontend;

use App\Cate;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\MailRequest;
use App\Order;
use App\Order_detail;
use App\Product;
use App\Product_image;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Auth, Cart, Mail;

class FrontController extends Controller
{
    public function getLogin() {
        return view('frontend.pages.login');
    }
    public function postLogin(LoginRequest $request) {
        if (Auth::attempt(['username'=>$request->txtUsername, 'password'=>$request->txtPassword])) {
            dd(123);
        } else {
            return redirect()->back()->with(['level'=>'danger', 'flash'=>'Username hoặc password chưa đúng']);
        }
    }

    public function getIndex() {
        $slide = DB::table('slides')->select('image')->get()->toArray();
        $product_new = DB::table('products')->select('id', 'name', 'price', 'image', 'alias')->orderBy('id', 'DESC')->take(4)->get()->toArray();
        $product_top = DB::table('products')->select('id', 'name', 'price', 'image', 'alias')->orderBy('id', 'ASC')->get()->toArray();

        return view('frontend.pages.index', compact('slide', 'product_new', 'product_top'));
    }

    public function getProductType($id) {
        $product = Product::find($id);
        $product_detail = Product_image::where('product_id', $id)->get()->toArray();
        $cates = Cate::select('id', 'name', 'alias')->get()->toArray();
//        echo "<pre>";
//        print_r($product_detail);
//        echo "</pre>";
//        exit;
        return view('frontend.pages.product_type', compact('product_detail', 'product', 'cates'));
    }

    public function getAbout() {
        return view('frontend.pages.about');
    }
    public function getContact() {
        return view('frontend.pages.contacts');
    }
    public function postContact(MailRequest $request) {
        $data = ['hoTen'=>$request->txtName, 'email'=>$request->txtEmail, 'subject'=>$request->txtSubject, 'mess'=>$request->txtMessage];
        Mail::send('frontend.pages.blanks', $data, function ($msg) {
            $msg->from('lek57v@gmail.com', 'Admin');
            $msg->to('lek57v@gmail.com', 'Customer')->subject('Đây là mail phản hồi từ khách hàng');
        });
        echo "<script>
            alert('Gửi thành công! Chúng tôi sẽ liên hệ trong thời gian sớm nhất');
            window.location = '".route('front.index')."'
        </script>";
    }

    public function getCheckout() {
        return view('frontend.pages.checkout');
    }
    public function postCheckout(CheckoutRequest $request) {
        $order = new Order();
        $order->code = rand_code(10);
        $order->fullname = $request->txtName;
        if ($request->gender == 1) {
            $order->gender = 1;
        } else {
            $order->gender = 2;
        }
        $order->email = $request->txtEmail;
        $order->phone = $request->txtPhone;
        $order->address = $request->txtAddress;
        $order->note = $request->txtNotes;
        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        } else {
            $order->user_id = 1;
        }
        $order->save();

        $content = Cart::content();
        foreach ($content as $item) {
            $order_detail = new Order_detail();
            $order_detail->quantity = $item->qty;
            if ($request->payment_method == "COD") {
                $order_detail->pay = 1;
            } else {
                $order_detail->pay = 0;
            }
            $order_detail->product_id = $item->id;
            $order_detail->order_id = $order->id;
            $order_detail->save();
        }

        echo "<script>
            alert('Đặt hàng thành công');
            window.location = '".route('front.index')."';
        </script>";

        Cart::destroy();
    }

    public function getSearch(Request $request) {
        $request->validate([
            'search' => 'required'
        ], [
            'search.required' => 'nhập từ khóa'
        ]);
        $cates = Cate::select('id', 'name', 'alias')->get()->toArray();
        $product = DB::table('products')->where('name', 'like', '%'.$request->search.'%')
                                        ->orWhere('price', 'like', $request->search)
                                        ->get()->toArray();

        return view('frontend.pages.search', compact('product','cates'));
    }

    public function getProduct($id) {
        $product = Product::find($id);
        $product_related = Product::where('cate_id', $product['cate_id'])->get()->toArray();
        $product_detail = Product::find($id)->productImg->toArray();
//        echo "<pre>";
//        print_r($product_detail);
//        echo "</pre>";
//        exit;
        $product_new = DB::table('products')->select('id', 'name', 'price', 'image', 'alias')->orderBy('id', 'DESC')->take(4)->get()->toArray();
//        echo "<pre>";
//        print_r($product_related);
//        echo "</pre>";
//        exit;
        return view('frontend.pages.product', compact('product_related','product', 'product_new', 'product_detail'));
    }
}
