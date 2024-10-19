<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class Customer extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'customer';


    protected function guard()
    {
        return Auth::guard('customer');
    }

    function profile(){
        return "profile";
    }

    public function showLoginForm()
    {
        return "login";
    }

}
