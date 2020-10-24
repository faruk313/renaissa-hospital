<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Models\PatientPayment;
use Illuminate\Http\Request;

use Auth;
use Validator;
use DataTables;
use Carbon\Carbon;

class PatientPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        $patient_paid_amount= 0;
        $patient_due_amount= 0;
        
        $patient_payments = PatientPayment::orderBy('id','desc')->get();
        
        if($patient_payments->count()>0){
            $patient_paid_amount = PatientPayment::sum('paid_amount');
            $patient_due_amount = PatientPayment::sum('due_amount');
            
            $total_count ='<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$patient_paid_amount.'</td>'.
            '<td></td>'.
            '<td></td>';
        }
        else{
            $total_count = '';
        }
        return view ('admin.pages.patient_payment.list', compact('patient_payments','total_count'));
    }
    // public function index()
    // {
    //     $patient_payments = PatientPayment::all();
    //     return view('admin.pages.patient_payment.list', compact('patient_payments'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient_data = PatientPayment::where('invoice_id', $request->payment_id)->latest()->first();
        
        
        //dd($patient_data);
        $current_date = Carbon::now()->format('Y-m-d');
        $patient_paid = PatientPayment::create([
            'payment_date' => $current_date,
            'invoice_id' => $request->payment_id,
            'paid_amount' => $request->due_amount,
            'due_amount' => $patient_data->due_amount - $request->due_amount,
        ]);

        Session::flash('success','Patient Due Paid ...');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function show(PatientPayment $patientPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientPayment $patientPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientPayment $patientPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientPayment $patientPayment)
    {
        //
    }
}
