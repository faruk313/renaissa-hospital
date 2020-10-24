<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\BrokerIncomeHistory;
use Illuminate\Http\Request;

class BrokerIncomeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_count = '';
        
        $broker_income_histories = BrokerIncomeHistory::all();
        
        if($broker_income_histories->count()>0){
            $total_income = 0;
            $total_payable = 0;

            $total_income = BrokerIncomeHistory::sum('broker_income_amount');
            $total_payable = BrokerIncomeHistory::sum('broker_payable_amount');

            $total_count= '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$total_income.'</td>'.
            '<td>'.$total_payable.'</td>';

        }
        // else{
        //     $total_count = '';
        // }

        return view('admin.pages.broker_income_history.list', compact('broker_income_histories','total_count'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrokerIncomeHistory  $brokerIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function show(BrokerIncomeHistory $brokerIncomeHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrokerIncomeHistory  $brokerIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(BrokerIncomeHistory $brokerIncomeHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrokerIncomeHistory  $brokerIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrokerIncomeHistory $brokerIncomeHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrokerIncomeHistory  $brokerIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrokerIncomeHistory $brokerIncomeHistory)
    {
        //
    }
}
