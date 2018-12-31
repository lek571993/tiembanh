<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\LoginRequest;
use Auth;
use Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login');
    }

    public function postLogin(LoginRequest $request) {
        if (Auth::attempt(['username' => $request->txtUsername, 'password'=>$request->txtPassword, 'level'=>1])) {
            return redirect()->route('admin.user.getList');
        } else {
            return redirect()->back()->with(['level'=>'danger', 'flash'=>'Kiểm tra lại username hoặc password']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('admin.user.getLogin');
    }
}
