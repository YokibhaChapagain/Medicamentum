<?php

namespace App\Http\Controllers;
use App\Models\Pharmacy;
use App\Models\User;

use Illuminate\Http\Request;

class PharmacyRegisterController extends Controller
{
    public function show()
    {

        return view('auth.pharmacyregister');
    }
    public function store(Request $request)
    {
        $request->validate([
            'registration' => 'required|string|unique:pharmacys|regex:/^R-\d{4}\/\d{4}$/',
            'license' => 'required|string|unique:pharmacys|regex:/^L-\d{4}\/\d{4}$/',
            'telephonenumber'=> 'required|numeric|digits:9|unique:pharmacys',
            'location'=>'required|string'
        ]);

        $pharmacy = new Pharmacy;


        $pharmacy->registration = $request->registration;
        $pharmacy->license = $request->license;
        $pharmacy->telephonenumber = $request->telephonenumber;
        $pharmacy->location=$request->location;

        $pharmacyUserId = session('pharmacy_user_id'); // Retrieve the stored user's ID
        $user = User::find($pharmacyUserId);

        if ($user && $user->role == 'Pharmacy') {
            $pharmacy->user()->associate($user);
            $pharmacy->save();

            // Clear the stored user's ID from the session
            session()->forget('pharmacy_user_id');


            return redirect('login')->with('status', 'registration process completed');

    }

    return redirect()->back()->with('status', 'Pharmacy user not found');

}
}
