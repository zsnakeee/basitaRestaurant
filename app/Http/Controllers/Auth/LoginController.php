<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]));

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return back()->withInput($request->only('email'))->withErrors(['email' => 'failed']);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('home');
    }
}
