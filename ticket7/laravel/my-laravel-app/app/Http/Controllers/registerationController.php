<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerationController extends Controller
{
    //
    public function register(request $request){
         $username = $request->input('username');
         $email = $request->input('email');
         $password = $request->input('password');
         echo "username: " . $username . " email: " . $email . ' password' . $password;
    }
}
