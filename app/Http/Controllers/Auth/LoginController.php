<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLOgin(Request $request)
    {
        try {
            $rememberMe = (!empty($request->remember) ? true : false);

            if (Sentinel::authenticate($request->except('remember'), $rememberMe)) {
                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Incorrect email or password.');
            }
        } catch (NotActivatedException $e) {
            return redirect()->back()->with('error', 'Your account has not been activated yet.');
        } catch (ThrottlingException $e) {
            return redirect()->back()->with('error', 'Suspicious activity has occured on your IP address and you have been denied access for another '.$e->getDelay().' seccond.');
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }
}
