<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\IncomeReport;
use App\Models\Invoice;
use App\Models\DoctorIncomeHistory;
use App\Models\DoctorPayment;
use App\Models\PatientPayment;
use App\Models\Expense;
use App\Models\BrokerPayment;
use DB;
use Illuminate\Http\Request;

class IncomeReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_count ='';

        $doctor_paid = DoctorPayment::select('invoice_date')
        ->selectRaw('sum(paid_amount) as doctor_paid_amount')
        ->groupBy('invoice_date')
        ->get();
      
        if($doctor_paid->count()>0){
            $total_of_income =0;
            $total_of_expense = 0;
            $total_of_doctor_paid = 0;
            $total_of_broker_paid = 0;
            $total_of_profit_or_loss = 0;
            $doctor_paid_amount = 0;

            foreach($doctor_paid as $i=>$list){
                $broker_paid = BrokerPayment::selectRaw('sum(paid_amount) as broker_paid_amount')
                ->where('invoice_date',$list->invoice_date)
                ->first();
    
                $expense = Expense::selectRaw('sum(expense_amount) as total_expense_amount')
                ->where('expense_date',$list->invoice_date)
                ->first();
    
                $total_income = Invoice::selectRaw('sum(total_amount) as total_amount')
                ->where('invoice_date',$list->invoice_date)
                ->first();
               
                if($total_income->total_amount != null){
                    $total_income = $total_income->total_amount;
                }
                else{
                    $total_income =0;
                }
                
                if($broker_paid->broker_paid_amount != null){
                    $broker_paid = $broker_paid->broker_paid_amount;
                }
                else{
                    $broker_paid =0;
                }
                
                if($expense->total_expense_amount != null){
                    $expense = $expense->total_expense_amount;
                }
                
                else{
                    $expense =0;
                }
                
                $profit_or_loss = $total_income - ($list->paid_amount + $broker_paid + $expense);
                
            
                $total_of_income +=$total_income;
                $total_of_expense +=$expense;
                $total_of_doctor_paid +=$list->doctor_paid_amount;
                $total_of_broker_paid +=$broker_paid;
                $total_of_profit_or_loss +=$profit_or_loss;
    
            };
    
            $total_count ='<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$total_of_income.'</td>'.
            '<td>'.$total_of_doctor_paid.'</td>'.
            '<td>'.$total_of_broker_paid.'</td>'.
            '<td>'.$total_of_expense.'</td>'.
            '<td>'.$total_of_profit_or_loss.'</td>';
        }

        return view('admin.pages.income_report.list', compact('doctor_paid','total_count'));
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
     * @param  \App\Models\IncomeReport  $incomeReport
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeReport $incomeReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeReport  $incomeReport
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeReport $incomeReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeReport  $incomeReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeReport $incomeReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeReport  $incomeReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeReport $incomeReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeReport  $incomeReport
     * @return \Illuminate\Http\Response
     */
    public function total_invoice_income()
    {
        $total_count ='';
        
        $total_incomes = PatientPayment::select('payment_date')->selectRaw('sum(paid_amount) as total_income')
        ->groupBy('payment_date')->get();
        
        if($total_incomes->count()>0){
            $total = PatientPayment::sum('paid_amount');
            
            $total_count = '<td></td>'.
            '<td>Total :</td>'.
            '<td>'.$total.'</td>';
        }

        return view('admin.pages.income_report.total_income', compact('total_incomes','total_count'));
    }
}
