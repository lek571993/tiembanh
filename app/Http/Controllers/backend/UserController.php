<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getList() {
        $user = User::select('id', 'username', 'email', 'level')->orderBy('id', 'DESC')->get()->toArray();
        return view('backend.user.list', compact('user'));
    }

    public function getAdd() {
        return view('backend.user.add');
    }
    public function postAdd(UserRequest $request) {
        $user = new User();
        $user->username = $request->txtUser;
        $user->password = bcrypt($request->txtPass);
        $user->email = $request->txtEmail;
        $user->fullname = $request->txtFullname;
        $user->address = $request->txtAddress;
        $user->phone = $request->txtPhone;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();

        return redirect()->route('admin.user.getAdd')->with(['level'=>'success', 'flash'=>'Thêm thành công']);
    }

    public function getDelete($id) {
        $user = User::find($id);
        if (($id == 1) || (Auth::user()->id != 1 && $user['level'] == 1)) {
            echo "<script>
                alert('Bạn không được quyền xóa');
                window.location = '".route('admin.user.getList')."';
            </script>";
        } else {
            $user->delete($id);
            echo "<script>
                alert('Xóa thành công');
                window.location = '".route('admin.user.getList')."';
            </script>";
        }
    }

    public function getEdit($id) {
        $user = User::find($id)->toArray();
//        echo "<pre>";
//        print_r($user);
//        echo "</pre>";
//        exit;
        if (Auth::user()->id != 1 && ($id == 1 || ($user['level'] == 1 && Auth::user()->id != $id))) {
            echo "<script>
                alert('Bạn không được quyền sửa');
                window.location = '".route('admin.user.getList')."';
            </script>";
        }
        return view('backend.user.edit', compact('user', 'id'));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function postEdit($id, Request $request) {
        $user = User::find($id);
            $request->validate(
                [
                    'txtPass' => 'required',
                    'txtRePass' => 'required|same:txtPass'
                ],
                [
                    'txtPass.required' => 'Bạn chưa nhập mật khẩu',
                    'txtRePass.required' => 'Bạn chưa nhập lại mật khẩu',
                    'txtRePass.same' => 'Password nhập lại chưa đúng'
                ]);

        $user->password = bcrypt($request->txtPass);
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->fullname = $request->txtFullname;
        $user->address = $request->txtAddress;
        $user->phone = $request->txtPhone;
        $user->remember_token = $request->_token;
        $user->save();

        return redirect()->route('admin.user.getList')->with(['level' => 'success','flash' => 'Cập nhật thành công']);

    }
}
