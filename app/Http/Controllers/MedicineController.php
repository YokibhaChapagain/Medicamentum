<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function show()
    {
        return view("pharmacy.addmedicine");
    }

    public function store(Request $request ){
        $request->validate([
            'medicinename' => 'required|string',
            'description' => 'required|string',
            'manufacture' => 'required|date',
            'expiration' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'prescription' => ['required', 'in:0,1'],
            'image' => 'image|mimes:jpeg,jpg,png,gif,bmp,svg|max:2048',
        ]);

            $medicine= new Medicine;

            $medicine->name = $request->medicinename;
            $medicine->description = $request->description;
            $medicine->manufacture = $request->manufacture;
            $medicine->expiration=$request->expiration;
            $medicine->price = $request->price;
            $medicine->quantity = $request->quantity;
            $medicine->prescription_required=$request->prescription;

            // if ($request->has('prescription')) {
            //     $selectedPrescription = $request->input('prescription');
            //     if ($selectedPrescription == '1') {
            //         // "prescription_required" radio button was selected
            //         $medicine->prescription_required = 1;
            //     } elseif ($selectedPrescription == '0') {
            //         // "prescription_not_required" radio button was selected
            //         $medicine->prescription_required = 0;
            //     } else {
            //         // Handle any other value if needed
            //     }
            // }


            if($request ->hasFile('image')){
                $imagePath = $request->file('image')->store('public/images');
                $medicine->image = str_replace('public/','',$imagePath);
            }

            //Get currently authenticated pharmacy
            $pharmacy = Auth::user()->pharmacy;

            //Associate medicine with the pharmacy
            $pharmacy->medicines()->save($medicine);

            return redirect('pharmacy/inventory')->with('status', 'Medicine successfully added!');


    }

    public function inventory()
    {
        $pharmacy = Auth::user()->pharmacy;
        $medicines= $pharmacy->medicines;
        return view('pharmacy.inventory',compact('medicines'));
    }

    public function edit($id){
        $medicine= Medicine ::find($id);
        return view('pharmacy.edit',['medicine'=>$medicine]);
    }

    public function update(Request $request,$id){
        $medicine= Medicine ::find($id);
        $medicine->name = $request->medicinename;
        $medicine->description = $request->description;
        $medicine->manufacture = $request->manufacture;
        $medicine->expiration=$request->expiration;
        $medicine->price = $request->price;
        $medicine->quantity = $request->quantity;
        $medicine->prescription_required = $request->prescription;

        if($request ->hasFile('image')){
            $imagePath = $request->file('image')->store('public/images');
            $medicine->image = str_replace('public/','',$imagePath);
        }
        $medicine->update();

        return redirect('pharmacy/inventory')->with('message', 'Updated Successfully!');
    }

    public function remove($id){
        $medicine= Medicine ::find($id);
        $medicine->delete();
        return redirect('pharmacy/inventory')->with('remove', 'Deleted Successfully!');
    }


}
