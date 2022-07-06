<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Tutor;

class LogoutController extends Controller
{
    public function logout() {
        Session::flush();
        Tutor::logout();
        return Redirect('welcome');
    }
}
