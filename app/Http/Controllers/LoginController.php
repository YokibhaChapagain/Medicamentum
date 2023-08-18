<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $userRole = Auth::user()->role;

    switch ($userRole) {
        case 'User':
            return redirect()->intended('user/dashboard');
        case 'Admin':
            return redirect()->intended('admin/dashboard');
        case 'Pharmacy':
            return redirect()->intended('pharmacy/dashboard');
        default:
            // Handle other roles or unexpected cases
            return redirect()->intended('default.dashboard');
    }
}

return back()->withErrors([
    'email' => 'You entered incorrect credential',
]);
    }
}
