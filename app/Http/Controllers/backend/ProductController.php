<?php

namespace App\Http\Controllers\backend;

use App\Cate;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Product_image;
use App\ProductImage;
use Request;
use File, Auth;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getList() {
        $product = Product::select('id', 'name', 'price', 'cate_id', 'alias', 'created_at')->get()->toArray();
        return view('backend.product.list', compact('product'));
    }

    public function getAdd() {
        $data = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('backend.product.add', compact('data'));
    }
    public function postAdd(ProductRequest $request) {
        $product = new Product();
        $product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->price = $request->txtPrice;
        $product->intro = $request->txtIntro;
        $product->content = $request->txtContent;
        $product->keywords = $request->txtKeywords;
        $product->description = $request->txtDescription;
        $product->cate_id = $request->txtParentId;
        $product->user_id = Auth::user()->id;
        $file_name = $request->file('fImages')->getClientOriginalName();
        $product->image = $file_name;
        $request->file('fImages')->move('resources/views/upload/', $file_name);
        $product->save();

        $product_id = $product->id;
        if ($request->hasFile('ProductDetail')) {
            foreach ($request->file('ProductDetail') as $file) {
                $img_detail = new Product_image();
                if (isset($file)) {
                    $img_detail->product_id = $product_id;
                    $file_name = $file->getClientOriginalName();
                    $img_detail->image = $file_name;
                    $file->move('resources/views/detail/', $file_name);
                    $img_detail->save();
                }
            }
        }
        return redirect()->route('admin.product.getAdd')->with(['level' => 'success','flash' => 'Thêm thành công']);
    }

    public function getDelete($id) {
        $product_detail = Product::find($id)->productImg->toArray();
        foreach ($product_detail as $item) {
            File::delete('resources/views/detail/'.$item['image']);
        }
        $product = Product::find($id);
        File::delete('resources/views/upload/'.$product['image']);
        $product->delete($id);

        return redirect()->route('admin.product.getList')->with(['level' => 'success','flash' => 'Xóa thành công']);
    }

    public function getEdit($id) {
        $data = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        $product = Product::find($id);
        $product_img = Product::find($id)->ProductImg->toArray();

        return view('backend.product.edit', compact('data', 'product', 'product_img'));
    }
    public function postEdit(Request $request, $id) {
        $product = Product::find($id);
        $product->cate_id = Request::input('txtParentId');
        $product->user_id = Auth::user()->id;
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDescription');
        $img_current = 'resources/views/upload/'.Request::input('img_current');
        if (Request::hasFile('fImages')) {
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('resources/views/upload/', $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        $product->save();

        if (Request::hasFile('ProductDetail')) {
            foreach (Request::file('ProductDetail') as $file) {
                $img_detail = new Product_image();
                if (isset($file)) {
                    $img_detail->product_id = $product->id;
                    $file_name = $file->getClientOriginalName();
                    $img_detail->image = $file_name;
                    $file->move('resources/views/detail/', $file_name);
                    $img_detail->save();
                }
            }
        }
        return redirect()->route('admin.product.getList')->with(['level' => 'success','flash' => 'Cập nhật thành công']);
    }

    public function getDelImg($id) {
        if (Request::ajax()) {
            $idHinh = (int)Request::get('idHinh');
            $image_detail = Product_image::find($idHinh);
            if (!empty($image_detail)) {
                $img = 'resources/views/detail/'.$image_detail->image;
                if (File::exists($img)) {
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }
}
