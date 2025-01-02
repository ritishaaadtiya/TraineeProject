<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\registration;

class ForgotPasswordController extends Controller
{
    //
    public function forgotpswform()
    {
        return view('forgotpassword');
    }
    public function sendmail(Request $request)
    {
        $email = $request->email;
        # validate email
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|exists:registrations,email'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validate->errors()
            ]);
        }
        # if email exists update or insert in to password reset table
        $token = Str::random();
        DB::table('password_resetsRegisterTable')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]
        );
        $sendmail = new ResetPasswordMail($token);
        Mail::to($request->email)->send($sendmail);
        return response()->json([
            'email' => $email
        ]);
    }
    public function resetpasswordform($token)
    {   # check request (password reset) in db 
        $passwordreset = DB::table('password_resetsRegisterTable')->where('token', $token)->first();
        if (!$passwordreset || $passwordreset->created_at < now()->subMinutes(60)) {
            return response()->json([
                'status' => 'error',
                'error' => 'Token expired or invalid'
            ]);
        }
        # fatch user details using email
        $user = registration::where('email', $passwordreset->email)->first();

        return view('formresetpassword', ['user' => $user->username, 'email' => $user->email, 'token' => $token]);
    }
    function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'token' => 'required',
            'confirmpsw' => 'required|same:password'
        ]);
        $token = $request->token;
        $email = $request->email;
        $passwordreset = DB::table('password_resetsRegisterTable')->where('email', $email)->where('token', $token)->first();
        if (!$passwordreset || $passwordreset->created_at < now()->subMinutes(60)) {
            return response()->json([
                'error_msg' => 'Inavlid Token or expired',
                'status' => 'error',
                'token' => $token
            ]);
        }

        $user = registration::where('email', $request->email)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        # Delete token from the table after reset the password
        DB::table('password_resetsRegisterTable')->where('token', $request->token)->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'password reset successfully'
        ]);
    }
}
