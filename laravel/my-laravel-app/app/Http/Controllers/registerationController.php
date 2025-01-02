<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\registration;

class registerationController extends Controller
{
    public function showform()
    {
        return view('registeration');
    }
    public function register(request $request)
    {
        $arr = [];
        # Validate the requested data
        $validate = Validator::make($request->all(), [
            'username' => 'required|string',
            'email' => 'required|email|unique:registrations,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        # return json response 
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'error_message' => $validate->errors(), 422]);
        } else {
            registration::create(
                [
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]
            );
        }
        return response()->json(['status' => 'success', 'msg' => "Successfully user created"]);
    }
}
