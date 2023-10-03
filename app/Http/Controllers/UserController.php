<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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


    public function display(){
        $user = Auth::user();

        $usersWithUserRole = User::where('role', 'user')->get();
        return view('user.user-details',compact('user','usersWithUserRole'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'email' => 'required|email|unique:users,email,' . $user->id,
        'mobilenumber' => 'required',
    ]);

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'mobilenumber' => $request->input('mobilenumber'),
    ]);

    return redirect()->route('user.details');
}

}
