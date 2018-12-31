<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\SlideRequest;
use App\Slide;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function getList() {
        $slide = Slide::select('id', 'image', 'created_at')->get()->toArray();
        return view('backend.slide.list', compact('slide'));
    }

    public function getAdd() {
        return view('backend.slide.add');
    }
    public function postAdd(SlideRequest $request) {
        $slide = new Slide();
        $slide->link = $request->txtLink;
        $file_name = $request->file('sImages')->getClientOriginalName();
        $slide->image = $file_name;
        $request->file('sImages')->move('resources/views/slide/', $file_name);
        $slide->save();

        return redirect()->route('admin.slide.getAdd')->with(['level'=>'success', 'flash'=>'Thêm thành công']);
    }

    public function getDelete($id) {
        $slide_del = Slide::find($id);
        File::delete('resources/views/slide/'.$slide_del->image);
        $slide_del->delete($id);
        return redirect()->route('admin.slide.getList')->with(['level'=>'success', 'flash'=>'Xóa thành công']);
    }

    public function getEdit($id) {
        $slide_edt = Slide::find($id);
        return view('backend.slide.edit', compact('slide_edt'));
    }
    public function postEdit($id, Request $request) {
        $slide_edt = Slide::find($id);
        $slide_edt->link = $request->txtLink;
        $img_current = 'resources/views/slide/'.$request->img_current;
        if ($request->hasFile('sImages')) {
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
            $file_name = $request->file('sImages')->getClientOriginalName();
            $slide_edt->image = $file_name;
            $request->file('sImages')->move('resources/views/slide/', $file_name);
        }
        $slide_edt->save();
        return redirect()->route('admin.slide.getList')->with(['level'=>'success', 'flash'=>'Sửa thành công']);
    }
}
