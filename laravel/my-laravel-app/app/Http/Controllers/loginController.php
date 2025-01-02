<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function showform()
    {

        return view('login');
    }
    public function handelLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'error_message' => $validate->errors(),
                400
            ]);
        }
        $remember = $request->has('remember');
        $user = ['email' => $request->email, 'password' => $request->password];
        if (!Auth::attempt($user, $remember)) {
            return response()->json([
                'status' => 'error',
                'error_message' => 'Invalid credentials',
                401
            ]);
        }
        # Genrate token 
        $userdata = Auth::user();
        $token = $userdata->createToken('token-genrate')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'user' => $request->email,
            'password' => $request->password,
            'token' => trim($token)

        ]);
    }
}
