<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class PreparedQuotationController extends Controller
{
    public function index()
    {
       $data =  DB::select('
       SELECT order_id, status, description, prescriptions.note, SUM(total) AS amount, quotations.payment_status
       FROM quotations
       INNER JOIN prescriptions ON prescriptions.id = quotations.order_id
       WHERE quotations.user_id = '.Auth::id().'
       GROUP BY order_id, status, description, prescriptions.note, quotations.payment_status;'
   );
       return view('user.prepared-quotation', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $data = DB::table('quotations')->where('order_id', $request->id)->update(array('status' => $request->status));

        return redirect('/user/prepared-quotation');
    }
}
