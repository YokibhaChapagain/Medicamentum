<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class UploadedPrescriptionController extends Controller
{
    public function index($id)
    {
        $user = Auth::user()->pharmacy;
        $drug = $user->medicines;

        $user_drugs = Prescription::find($id);
        if (!$user_drugs) {
            return redirect()->with('status',' No prescriptions Found');
        }
        $data = Quotation::select('*')->where('order_id', $id)->get();
        return view('pharmacy.uploaded-prescription', compact('drug', 'user_drugs', 'data'));
    }

    public function Details($id)
    {
        $quotations = Quotation::select('quotations.*', 'medicines.name AS medicine_name')
    ->join('medicines', 'quotations.drugs', '=', 'medicines.id')
    ->where('quotations.order_id', $id)
    ->get();
        $drug = Medicine::all();
        $user_drugs = Prescription::find($id);
        $data = Quotation::select('*')->where('order_id', $id)->get();
        return view('user.quotation-details', compact('quotations','drug','user_drugs', 'data'));
    }
}
