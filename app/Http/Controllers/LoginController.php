<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        $credentials = $request->only('email', 'password');
        if (Tutor::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Login successfully.')->withErrors('fail', 'Failed to login!');
        }
        return redirect("login")->withSuccess('You not have valid credentials!');
    }
}
