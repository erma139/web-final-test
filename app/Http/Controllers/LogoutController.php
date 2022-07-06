<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Tutor;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout() {
        Session::flush();
        Tutor::logout();
        return Redirect('welcome');
    }
}
