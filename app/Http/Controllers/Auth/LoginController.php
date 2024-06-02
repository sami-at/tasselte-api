<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the provided username and password match
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = User::where('email', $request->email)->first();
            Auth::login($user); // Assuming user with ID 1 is the admin user
            // dd('Reached redirection point');
            return redirect()->route('admin.products.index');
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid email or password.']);
    }
}
