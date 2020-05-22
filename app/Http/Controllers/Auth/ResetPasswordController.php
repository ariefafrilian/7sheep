<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Reminder;
use App\User;

class ResetPasswordController extends Controller
{
    public function recoverPassword($encrypt)
    {
        return view('auth.recover-password', compact('encrypt'));
    }

    public function resetPassword(Request $request, $encrypt)
    {
        $decrypt = decrypt($encrypt);

        $password = $request->validate([
            'password' => 'required|string|min:8|max:191|confirmed',
        ]);

        $user = User::findOrFail($decrypt->user_id);

        if (Reminder::complete($user, $decrypt->code, $password['password'])) {
            return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Oops! There is something wrong.');
        }

    }
}
