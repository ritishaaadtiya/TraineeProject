<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        // Validate the form input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Access the form data (name, email, password)
        $name = $validated['name'];
        $email = $validated['email'];
        $password = $validated['password'];

        // Create the user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect the user (e.g., to the dashboard)
        return redirect()->route('login')->with('success', 'Successfully registered!');
    }
    public function login(Request $request)
    {
        // Validate the login data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Redirect to dashboard if successful
            return redirect()->route('dashboard')->with('success', 'Successfully Logged in !');; // Adjust the route as needed
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Successfully Logged out!');
    }
}
