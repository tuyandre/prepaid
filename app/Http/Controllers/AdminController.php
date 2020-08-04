<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register(){
        return view('auth.admin.register');
    }
    public function login(){
        return view('auth.admin.login');
    }
}
