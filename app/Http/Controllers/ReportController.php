<?php

namespace App\Http\Controllers;

use App\Models\Ordercart;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function salesReport()
    {
        $pharmacyId = Auth::user()->pharmacy;

        $salesReport = Quotation::where('payment_status', 'paid')
            ->with(['user','medicine'])
            ->get(['quanity', 'created_at', 'total', 'user_id','drugs']);

        foreach ($salesReport as $quotation) {
            $quotation->created_date = Carbon::parse($quotation->created_at)->toDateString();
            $user = $quotation->user;
            $medicine = $quotation->medicine;

            if ($user) {
                $quotation->user_name = $user->name;
            } else {
                $quotation->user_name = 'User Not Found';
            }
            if ($medicine) {
                $quotation->medicine_name= $medicine->name;
            } else {
                $quotation->medicine_name= 'User Not Found';
            }
        }
        return view('pharmacy.sales_report', compact('salesReport'));
    }


public function manualSalesReport(){
    $manualSalesReport = Ordercart::where('payment_status', 'paid')
    ->with(['user','medicine'])
    ->get(['quantity', 'created_at', 'total', 'user_id','product_id']);

foreach ($manualSalesReport as $sales) {
    $sales->created_date = Carbon::parse($sales->created_at)->toDateString();
    $user = $sales->user;
    $medicine = $sales->medicine;
    if ($user) {
                $sales->user_name = $user->name;
            } else {
                $sales->user_name = 'User Not Found';
            }
            if ($medicine) {
                $sales->medicine_name= $medicine->name;
            } else {
                $sales->medicine_name= 'User Not Found';
            }
}

    return view('pharmacy.manual_sales_report', compact('manualSalesReport'));
}


}
