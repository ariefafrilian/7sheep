<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\UserRegistration;
use Activation;
use Sentinel;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'gender' => 'required|in:M,F',
            'birth' => 'required|string|date',
            'username' => 'required|string|max:191|unique:users,username',
            'email' => 'required|string|max:191|email|unique:users,email',
            'password' => 'required|string|min:8|max:191|confirmed',
            'terms' => 'required|in:1',
        ]);

        $user = Sentinel::register($credentials);

        $role = Sentinel::findRoleBySlug('user');
        $role->users()->attach($user);

        $activation = Activation::create($user);

        event(new UserRegistration($activation));

        return back()->with('success', 'Please check your email to activate your account.');
    }
}
