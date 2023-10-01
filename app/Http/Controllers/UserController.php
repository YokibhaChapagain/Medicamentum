<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Quotation;
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
}
