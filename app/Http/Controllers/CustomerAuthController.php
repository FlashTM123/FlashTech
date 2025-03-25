<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{

    public function showLoginForm()
    {
        return view('customer.login');
    }
    public function showRegisterForm()
    {
        return view('customer.register');
    }

}
