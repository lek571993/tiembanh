<?php

namespace App\Http\Controllers\backend;

use App\Cate;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use Illuminate\Support\Facades\DB;
use File;

class CateController extends Controller
{
    public function getList() {
        $cate = DB::table('cates')->get()->toArray();
//        echo "<pre>";
//        print_r($cate);
//        echo "</pre>";
//        exit;
        return view('backend.cate.list', compact('cate'));
    }

    public function getAdd() {
        $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('backend.cate.add', compact('parent'));
    }

    public function postAdd(CateRequest $request) {
        $cate = new Cate;
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->parent_id = $request->txtParentId;
        $cate->keywords = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getAdd')->with(['level'=>'success', 'flash'=>'Success! Thêm thành công!']);
    }

    public function getDelete($id) {
        $parent = Cate::where('parent_id', $id)->count();
        if ($parent == 0) {
            $cate_id = $id;
            $product_id = Product::select('id')->where('cate_id', $cate_id)->get()->toArray();
            foreach ($product_id as $pro_id) {
                $product_detail = Product::find($pro_id['id'])->productImg->toArray();
                foreach ($product_detail as $pro_detail) {
                    File::delete('resources/views/detail/'.$pro_detail['image']);
                }
                $product = Product::find($pro_id['id'])->toArray();
                File::delete('resources/views/upload/'.$product['image']);
            }
            $ele = Cate::find($id);
            $ele->delete($id);
            return redirect()->route('admin.cate.getList')->with(['level'=>'success', 'flash'=>'Success! Xóa thành công']);
        } else {
            echo "<script>
                alert('Không được phép xóa');
                window.location = '".route('admin.cate.getList')."';
            </script>";
        }
    }

    public function getEdit($id) {
        $cate = Cate::find($id);
        $data = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('backend.cate.edit', compact('cate', 'data'));
    }
    public function postEdit($id, CateRequest $request) {
        $cate_new = Cate::find($id);
        $cate_new->name = $request->txtCateName;
        $cate_new->alias = changeTitle($request->txtCateName);
        $cate_new->parent_id = $request->txtParentId;
        $cate_new->order = $request->txtOrder;
        $cate_new->keywords = $request->txtKeywords;
        $cate_new->description = $request->txtDescription;
        $cate_new->save();

        return redirect()->route('admin.cate.getList')->with(['level'=>'success', 'flash'=>'Cập nhật thành công']);
    }
}
