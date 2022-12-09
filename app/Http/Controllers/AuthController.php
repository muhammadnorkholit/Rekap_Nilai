<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function loginCheck()
    {
        Request()->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $username = Request()->username;
        $password = Request()->password;
        
        if(Auth::attempt(['username' => $username, 'password' => $password,'role'=>'admin'])){
            return redirect()->intended('/admin/panel');
        }
        if(Auth::attempt(['username' => $username, 'password' => $password,'role'=>'operator'])){
            return redirect()->intended('/admin/panel');
        }

        return redirect()->back()->with('alert','User tidak ditemukan');
    }
}
