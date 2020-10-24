<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\BrokerPayment;
use App\Models\BrokerIncomeHistory;
use Illuminate\Http\Request;

class BrokerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_count= '';
        $broker_payments = BrokerIncomeHistory::select('invoice_date','broker_id')
            ->selectRaw('sum(broker_income_amount) as income_amount')
            ->selectRaw('sum(broker_payable_amount) as broker_amount')
            ->groupBy('invoice_date','broker_id')->get();

        if($broker_payments->count()>0){
            $income_amount =0;
            $broker_amount =0;
            foreach($broker_payments as $i=>$payment){ 
                $income_amount += $payment->income_amount;
                $broker_amount += $payment->broker_amount;
            };

            $total_count='<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$income_amount.'</td>'.
            '<td>'.$broker_amount.'</td>'.
            '<td></td>';
        }
            
        return view('admin.pages.broker_payment.list', compact('broker_payments','total_count'));
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
        $broker_payment = BrokerPayment::where('invoice_date', $request->invoice_date)->where('broker_id', $request->broker_id)->first();
       
        $validatedData = $request->validate([
            'invoice_date'                  =>  'required',
            'broker_id'                     =>  'required|numeric',
            'paid_amount'                   =>  'required|numeric',
        ]);

        if($broker_payment == null){
            $data = array(
                'invoice_date'                  => $validatedData['invoice_date'],
                'broker_id'                     => $validatedData['broker_id'],
                'paid_amount'                   => $validatedData['paid_amount'],
            );
            BrokerPayment::create($data);
            Session::flash('info','Broker Payment Paid Successfully');
        }else{

            
            $data = array(
                'paid_amount'                   => $validatedData['paid_amount'],
            );
            $broker_payment->update($data);
            Session::flash('info','Broker Payment Paid Successfully');
        }
        
        return redirect()->route('brokerPayment.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrokerPayment  $brokerPayment
     * @return \Illuminate\Http\Response
     */
    public function show(BrokerPayment $brokerPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrokerPayment  $brokerPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(BrokerPayment $brokerPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrokerPayment  $brokerPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrokerPayment $brokerPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrokerPayment  $brokerPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrokerPayment $brokerPayment)
    {
        //
    }
}
