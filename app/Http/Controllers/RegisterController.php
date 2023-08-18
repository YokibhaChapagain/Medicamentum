<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pharmacy;


class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'role' => 'required|in:User,Pharmacy,Admin',
        ]);

        if ($request->role === 'User' || $request->role === 'Admin') {
            $request->validate([
                'mobilenumber' => 'required|string|min:10|unique:users',
            ]);
        }



        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->input('password');
        $user->role=$request->role;
        $user->mobilenumber = $request->input('mobilenumber');


        $user->save();

        if($request->role=='Pharmacy'){
            session(['pharmacy_user_id' => $user->id]);
            return redirect()->route('pharmacy.register');
        }
        else
        {return redirect('login')->with('status', 'You have been registered!');
    }


    }


public function getPharmacyInfo()
    {
      $user= User::where('role', 'Pharmacy')->with('pharmacy')->first();

      if($user && $user-> pharmacy){
        return response()->json(['pharmacy'=> $user->pharmacy]);
      }
        return response()->json(['error' => 'Pharmacy information not found']);
      }

}
