<?php

namespace App\Http\Controllers;
use App\Models\Medicine;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $medicines = Medicine::with(['pharmacy', 'pharmacy.pharmacyUser'])->get();
        return view('user.dashboard',compact('user','medicines'));
    }
}
