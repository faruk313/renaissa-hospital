<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DoctorIncomeHistory;
use App\Models\Invoice;
use DB;
use Illuminate\Http\Request;

class DoctorIncomeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_count= '';
        // $doctor_income_histories = DB::table('invoices')
        // ->join('doctors', 'doctors.id', '=', 'invoices.doctor_id')
        // ->get();

        $doctor_income_histories = DoctorIncomeHistory::all();
      
        if($doctor_income_histories->count()>0){
            $doctor_total_income =0;
            $doctor_total_commission =0;
            
            $doctor_total_income = DoctorIncomeHistory::sum('doctor_income_amount');
            $doctor_total_commission = DoctorIncomeHistory::sum('doctor_payable_amount');

            $total_count = '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total :</td>'.
            '<td>'.$doctor_total_income.'</td>'.
            '<td>'.$doctor_total_commission.'</td>';
        }
        return view('admin.pages.doctor_income_history.list', compact('doctor_income_histories','total_count'));
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
     * @param  \App\Models\DoctorIncomeHistory  $doctorIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorIncomeHistory $doctorIncomeHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorIncomeHistory  $doctorIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorIncomeHistory $doctorIncomeHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorIncomeHistory  $doctorIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorIncomeHistory $doctorIncomeHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorIncomeHistory  $doctorIncomeHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorIncomeHistory $doctorIncomeHistory)
    {
        //
    }
}
