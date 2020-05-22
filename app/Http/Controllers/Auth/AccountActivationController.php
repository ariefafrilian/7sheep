<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Activation;
use App\User;

class AccountActivationController extends Controller
{
    public function activate($encrypt)
    {
        $decrypt = decrypt($encrypt);

        $user = User::findOrFail($decrypt->user_id);

        if (Activation::complete($user, $decrypt->code)) {
            return redirect()->route('login')->with('success', 'Your account is activate.');
        } else {
            return redirect()->route('login')->with('error', 'Oops! There is something wrong.');
        }

    }
}
