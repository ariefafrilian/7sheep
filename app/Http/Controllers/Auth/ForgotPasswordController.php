<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ForgotPassword;
use Reminder;
use App\User;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $email = $request->validate([
            'email' => 'required|string|email',
        ]);

        if ($user = User::whereEmail($email)->first()) {
            if (Reminder::exists($user)) {
                Reminder::removeExpired();
            }

            $reminder = Reminder::create($user);

            event(new ForgotPassword($reminder));

            return back()->with('success', 'Please check your email to recover your password.');
        } else {
            return back()->with('success', 'Please check your email to recover your password.');
        }

    }
}
