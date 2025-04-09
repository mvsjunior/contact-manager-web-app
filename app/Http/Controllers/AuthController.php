<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index(Request $request){

        if(Auth::check()){
            return redirect('/');
        }

        return view('auth.login');
    }

    public function auth(Request $request){

        if(!Auth::attempt($request->only('email', 'password'))) {
            Session::flash('message', 'Incorrect email or password.');
            return back()->withInput(['email']);
        }

        Session::flash('message', "Welcome");
        if(Auth::check()){
            return redirect('/');
        }
    }

    public function logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
