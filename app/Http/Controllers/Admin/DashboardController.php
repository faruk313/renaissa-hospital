<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\PathologyTest;
use App\Models\RefUser;

use App\Models\DoctorPayment;
use App\Models\BrokerPayment;
use App\Models\Expense;

use App\Models\Invoice;
use App\Models\PatientTest;

use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_patients = Patient::where('patient_status',true)->count();
        $total_tests = PathologyTest::where('test_status',true)->count();
        $total_doctors = Doctor::where('status',true)->count();
        $total_brokers = RefUser::where('ref_user_status',true)->count();

        $doctor_payments = DoctorPayment::sum('paid_amount');
        $broker_payments = BrokerPayment::sum('paid_amount');
        $total_expense = Expense::sum('expense_amount');

        $prescription_income = Invoice::sum('total_amount');
        $test_income = PatientTest::sum('test_net_amount');

        $total_income = $prescription_income+$test_income;

        $items = Invoice::groupBy('invoice_date')->get(['invoice_date']);
        
        $income_amounts = Invoice::select('invoice_date')
        ->selectRaw('sum(total_amount) as total_amount')
        ->whereMonth('invoice_date', Carbon::now()->month)
        ->groupBy('invoice_date')
        ->get();
        $income_dates = Invoice::select('invoice_date')->whereMonth('invoice_date', Carbon::now()->month)->groupBy('invoice_date')->get();

        $expense_array = Expense::all();

        //dynamic array
        if($income_amounts->count()>0){
            foreach($income_amounts as $object)
            {
                $income_amount_array[] = $object->total_amount/1000;
            }
        }
        else{
            //default array
            $income_amount_array = [22,44, 55, 57, 56, 61, 58, 63, 60, 66,94,120.55,11,22,33,94,120,10,11,22,33,44,99,88,99,12,34.99,22,54,67,11];   
        }

        if($income_amounts->count()>0){
            foreach($income_dates as $object)
            {
                $date = changeDateFormate($object->invoice_date,'d');
                $income_date_array[] = $date;
            }
        }
        else{
            $income_date_array = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
        }
        
        return view('dashboard',compact('total_patients','total_tests','total_doctors','total_brokers','doctor_payments','broker_payments','total_expense','prescription_income','test_income','total_income','income_amount_array','income_date_array','expense_array'));
    }

   
}
