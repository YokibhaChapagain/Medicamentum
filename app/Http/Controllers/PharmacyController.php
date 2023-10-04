<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Quotation;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



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


    public function display(){
        $user = Auth::user();

        $usersWithUserRole = User::where('role', 'pharmacy')->get();
        return view('pharmacy.pharmacy-details',compact('user','usersWithUserRole'));
    }

    public function edit(User $user)
    {
        $pharmacy =$user->pharmacy;
        return view('pharmacy.pharmacy-edit', compact('user','pharmacy'));
    }


        public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_image' => 'image|mimes:jpeg,jpg,png,gif,bmp,svg|max:2048',

        ]);
        if ($request->has('mobilenumber')) {
            $request->validate([
                'mobilenumber' => 'required',
            ]);

            $user->update([
                'mobilenumber' => $request->input('mobilenumber'),
            ]);
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('public/images');
            $user->profile_image = str_replace('public/', '', $imagePath);
        }
        $user->save();

        if ($user->pharmacy) {
            $user->pharmacy->update([
                'telephonenumber' => $request->input('telephone'),
                'location' => $request->input('location'),
            ]);
        }
        return redirect()->route('pharmacy.details')->with('status','Updated Successfully!');
    }
}
