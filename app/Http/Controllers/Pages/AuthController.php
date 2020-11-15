<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function renderLogin()
    {
        return view('pages.auth.login');
    }

    public function renderRegister()
    {
        return view('pages.auth.register');
    }
}
