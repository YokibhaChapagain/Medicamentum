<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Quotation;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PharmacyController extends Controller
{

    public function index()
    {
        $customers = User::where('role', 'user')->count();
        $user = Auth::user()->pharmacy;
        $medicines = $user->medicines->count();
        $newMedicines = Prescription::where('pharmacy_id', $user->id)
                                        ->where('confirm', 0)
                                        ->count();
        $accept = Quotation::where('status', '1')
                                        ->whereIn('order_id', function ($query) use ($user) {
                                            $query->select('id')
                                                ->from('prescriptions')
                                                ->where('pharmacy_id', $user->id);
                                        })
                                        ->distinct('order_id')
                                        ->count('status');
        $reject = Quotation::where('status', '2')
        ->whereIn('order_id', function ($query) use ($user) {
            $query->select('id')
                ->from('prescriptions')
                ->where('pharmacy_id', $user->id);
        })
        ->distinct('order_id')->count('status');

        $pending = Quotation::where('status', '0')
        ->whereIn('order_id', function ($query) use ($user) {
            $query->select('id')
                ->from('prescriptions')
                ->where('pharmacy_id', $user->id);
        })
        ->distinct('order_id')->count('status');
        
        return view('pharmacy.dashboard', compact('customers', 'medicines', 'newMedicines', 'accept', 'reject', 'pending'));
    }

    public function accept()
    {
        $user = Auth::user();

        $data = DB::table('quotations')
            ->join('prescriptions', 'prescriptions.id', '=', 'quotations.order_id')
            ->select('order_id', DB::raw('MAX(status) AS status'), 'prescriptions.note', DB::raw('SUM(amount) AS amount'))
            ->where('status', 1)
            ->where('prescriptions.pharmacy_id', $user->pharmacy->id) // Filter by authenticated user's pharmacy ID
            ->groupBy('order_id', 'prescriptions.note')
            ->get();

        return view('pharmacy.accept', compact('data'));
    }

    public function reject()
    {
        $user = Auth::user();

        $data = DB::table('quotations')
            ->join('prescriptions', 'prescriptions.id', '=', 'quotations.order_id')
            ->select('order_id', DB::raw('MAX(status) AS status'), 'prescriptions.note', DB::raw('SUM(amount) AS amount'))
            ->where('status', 2)
            ->where('prescriptions.pharmacy_id', $user->pharmacy->id) // Filter by authenticated user's pharmacy ID
            ->groupBy('order_id', 'prescriptions.note')
            ->get();

        return view('pharmacy.reject', compact('data'));
    }

    public function pending()
    {
          $user = Auth::user();
          $data = DB::table('quotations')
          ->join('prescriptions', 'prescriptions.id', '=', 'quotations.order_id')
          ->select('order_id', DB::raw('MAX(status) AS status'), 'prescriptions.note', DB::raw('SUM(amount) AS amount'))
          ->where('status', 0)
          ->where('prescriptions.pharmacy_id', $user->pharmacy->id) // Filter by authenticated user's pharmacy ID
          ->groupBy('order_id', 'prescriptions.note')
          ->get();

      return view('pharmacy.pending', compact('data'));
    }
}
