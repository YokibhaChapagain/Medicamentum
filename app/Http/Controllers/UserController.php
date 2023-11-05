<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $medicines = Medicine::with(['pharmacy', 'pharmacy.pharmacyUser'])->get();

        $totalPrescription = Prescription::where('user_id', Auth::id())->count();
        $accept = Quotation::where('status', '1')->where('user_id', Auth::id())->distinct('order_id')->count('status');
        $reject = Quotation::where('status', '2')->where('user_id', Auth::id())->distinct('order_id')->count('status');
        $pending = Quotation::where('status', '0')->where('user_id', Auth::id())->distinct('order_id')->count('status');
        return view('user.dashboard',compact('user','medicines','totalPrescription','accept','reject','pending'));
    }

    public function singleMedicine($id){
        $user = Auth::user();
        $medicine = Medicine::find($id);
        return view('user.medicine',compact('user','medicine'));
    }
    public function display(){
        $user = Auth::user();
        $usersWithUserRole = User::where('role', 'user')->get();
        return view('user.user-details',compact('user','usersWithUserRole'));
    }

    public function userPharmacy(){
        $pharmacy = User::where('role', 'pharmacy')->get();
        return view('user.user-pharmacy',compact('pharmacy'));
    }
    public function edit(User $user)
{
    return view('user.user-edit', compact('user'));
}


    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'mobilenumber' => 'required',
        'profile_image' => 'image|mimes:jpeg,jpg,png,gif,bmp,svg|max:2048',
        'address' => 'required',
    ]);

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'mobilenumber' => $request->input('mobilenumber'),
        'address'=> $request->input('address'),
    ]);

    if ($request->hasFile('profile_image')) {
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        $imagePath = $request->file('profile_image')->store('public/images');
        $user->profile_image = str_replace('public/', '', $imagePath);
    }

    $user->save();

    return redirect()->route('user.details')->with('status','Updated Successfully!');
}


}
