<?php

namespace App\Http\Controllers;
use App\Models\Medicine;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $medicines=Medicine::all();
        return view('user.orderCart', compact('medicines'));
    }
}
