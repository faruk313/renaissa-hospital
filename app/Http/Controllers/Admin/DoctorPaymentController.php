<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\DoctorIncomeHistory;
use App\Models\DoctorPayment;
use Illuminate\Http\Request;

use App\Models\Invoice;
use DB;
use Auth;
class DoctorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_count= '';

        $doctor_payments = DoctorIncomeHistory::select('doctor_income_histories.invoice_date','doctor_income_histories.doctor_id')
        ->join('doctors', 'doctor_income_histories.doctor_id', '=','doctors.id')
        ->selectRaw('sum(doctor_income_amount) as income_amount')
        ->selectRaw('sum(doctor_payable_amount) as doctor_amount')
        ->groupBy('invoice_date','doctor_id')
        ->orderBy('invoice_date','desc')
        ->get();
        
  
        if($doctor_payments->count()>0){
            $income_amount =0;
            $doctor_amount =0;

            foreach($doctor_payments as $i=>$payment){ 
                // $doctor_payment = DoctorPayment::where('doctor_id', $payment->doctor_id)->where('invoice_date',$payment->invoice_date)->first();
                // foreach($doctor_payment as $list){

                //     if($list->doctor->type == 2){
                //         $doctor_amount = $list->doctor_amount;
                //     }
                //     if($list->doctor->type == 3){
                //         $doctor_amount = $list->salary_or_contract_fees;
                //     }

                //     dd($doctor_amount);
                // }
        
                if($payment->doctor_amount==null){
                    $payment->doctor_amount = 0;
                }
                $income_amount += $payment->income_amount;
                $doctor_amount += $payment->doctor_amount;
            };

            $total_count='<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$income_amount.'</td>'.
            '<td>'.$doctor_amount.'</td>'.
            '<td></td>';
        }
                        
        return view('admin.pages.doctor_payment.list', compact('doctor_payments','total_count'));
    }

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
        $doctor_payment = DoctorPayment::where('invoice_date', $request->invoice_date)->where('doctor_id', $request->doctor_id)->first();
       
        $validatedData = $request->validate([
            'invoice_date'                  =>  'required',
            'doctor_id'                     =>  'required|numeric',
            'paid_amount'                   =>  'required|numeric',
        ]);

        if($doctor_payment == null){
            $data = array(
                'invoice_date'                  => $validatedData['invoice_date'],
                'doctor_id'                     => $validatedData['doctor_id'],
                'paid_amount'                   => $validatedData['paid_amount'],
                'user_id'                       => Auth::user()->id
            );
            DoctorPayment::create($data);
            Session::flash('info','Doctor Payment Paid Successfully');
        }else{

            
            $data = array(
                'paid_amount'                   => $validatedData['paid_amount'],
                'user_id'                       => Auth::user()->id
            );
            $doctor_payment->update($data);
            Session::flash('success','Doctor Payment Paid Successfully');
        }

        
        return redirect()->route('doctorPayment.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorPayment  $doctorPayment
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorPayment $doctorPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorPayment  $doctorPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorPayment $doctorPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorPayment  $doctorPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorPayment $doctorPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorPayment  $doctorPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorPayment $doctorPayment)
    {
        //
    }
}
