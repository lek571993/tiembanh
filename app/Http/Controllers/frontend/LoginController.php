<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('frontend.pages.login');
    }
    public function postLogin(LoginRequest $request) {
        if (Auth::attempt(['username'=>$request->txtUsername, 'password'=>$request->txtPassword])) {
            echo "<script>
                alert('Đăng nhập thành công');
                window.location = '".route('front.index')."';
            </script>";
        } else {
            return redirect()->back()->with(['level'=>'danger', 'flash'=>'Username hoặc Password chưa đúng']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('front.index');
    }

    public function getRegister() {
        return view('frontend.pages.signup');
    }
    public function postRegister(RegisterRequest $request) {
        $user = new User();
        $user->username = $request->txtUsername;
        $user->password = bcrypt($request->txtPassword);
        $user->email = $request->txtEmail;
        $user->fullname = $request->txtFullname;
        $user->address = $request->txtAddress;
        $user->phone = $request->txtPhone;
        $user->level = 2;
        $user->remember_token = $request->_token;
        $user->save();

        echo "<script>
            alert('Đăng ký thành công');
            window.location = '".route('front.getLogin')."';
        </script>";
    }
}
