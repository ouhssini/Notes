<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //  show the login form
    public function show()
    {
        return view('login.index');
    }

    // login the user 
    public function login(Request $request)
    {
        $credintials  = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::attempt($credintials,$request->boolean('remember_me'))) {
            $request->session()->regenerate();
            return to_route('note.index');
        } else {
            return back()->withErrors(['failed' => 'the email or password is invalid']);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return to_route('loginForm');
    }


    public function signupForm()
    {
        return view("login.signup");
    }
    public function signup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required| email| unique:users',
            'password' => 'required | min:9 | confirmed',
        ]);

        User::create($data);
        return to_route('login')->with('success', 'You have registered successfully');
    }
}
