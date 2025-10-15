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
        // Check which guard is being used
        if ($request->is('admin/*')) {
            // Redirect to admin login page if the request is for an admin route
            return route('admin.auth.login');
        }

        // Default redirection for regular users
        return route('user.auth.login');
    }
}
