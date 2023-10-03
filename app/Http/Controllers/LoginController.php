<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


use App\Models\User;


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


public function performlogout(){

    Session::flush();

    Auth::logout();

    return redirect('login');

}


public function emailVerifyGet()
    {
        return view('auth.emailVerify');
    }

    public function passwordResetGet($token)
    {
        return view('auth.changePassword', compact('token'));
    }

    public function emailVerifyPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $temp1 = User::where('email', '=', $request->email)->first();
        // $temp2 = Agency::where('email', '=', $request->email)->first();


        // if ($temp1 || $temp2) {
            if($temp1){
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::send('auth.forgotPass', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return redirect()->to(route('email.verify.get'))->with('success', 'Please check your inbox');
        }

        return back()->with('fail', 'Please enter registered Email');
    }

    public function passwordResetPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $temp1 = User::where('email', '=', $request->email)->first();
   

        $data = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if ($data && $temp1) {
            User::where('email', '=', $request->email)->update(['password' => Hash::make($request->password)]);
            DB::table('password_reset_tokens')->where('email', '=', $request->email)->delete();
            return redirect()->to(route('login'))->with('success', 'Successfully changed password!');
        }

        else {
            DB::table('password_reset_tokens')->where('email', '=', $request->email)->delete();
            return back()->with('fail', 'Please try again');
        }

    }
}
