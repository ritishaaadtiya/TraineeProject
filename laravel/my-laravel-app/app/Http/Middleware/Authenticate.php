<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (!$request->expectsJson()) {
            session()->flash('error', 'You must be logged in to access that page.');

            // Redirect to the login page if it's a web request
            return route('loginForm');
        }

        // For regular web requests, redirect to the login page
        return route('loginForm');
    }
}
