<?php

namespace App\Http\Controllers;
Use App\Models\Prescription;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $user = Prescription::where('user_id', Auth::id())->get();

        return view('user.history', compact('user'));
    }

    public function store(Request $request)
{
    $request->validate([
        'note' => 'required',
        'pharmacy_id'=>'required|exists:pharmacys,id',
        'image1' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        'image2' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        'image3' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    ]);

    $user = new Prescription();

    $user->note = $request->input('note');
    $user->user_id = $request->input('user_id');
    $user->pharmacy_id = $request->input('pharmacy_id');


    if ($request->hasFile('image1')) {
        $image1 = time() . rand(1, 1000) . '.' . $request->file('image1')->extension();
        $request->file('image1')->move(public_path('images'), $image1);
        $user->image1 = "images/" . $image1;
    }

    if ($request->hasFile('image2')) {
        $image2 = time() . rand(1, 1000) . '.' . $request->file('image2')->extension();
        $request->file('image2')->move(public_path('images'), $image2);
        $user->image2 = "images/" . $image2;
    }

    if ($request->hasFile('image3')) {
        $image3 = time() . rand(1, 1000) . '.' . $request->file('image3')->extension();
        $request->file('image3')->move(public_path('images'), $image3);
        $user->image3 = "images/" . $image3;
    }

    $user->save();

    return redirect('user/history');}

    public function show()
    {
        $user = Auth::user()->pharmacy;
        $prescription = Prescription::where('pharmacy_id', $user->id)->get();

        return view('pharmacy.prescription-list', compact('prescription'));
    }

    public function create()

{
    $pharmacyUsers=Pharmacy::all();


    return view('user.upload-prescription', compact('pharmacyUsers'));
}


}
