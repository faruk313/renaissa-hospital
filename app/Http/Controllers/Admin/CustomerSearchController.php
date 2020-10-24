<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\PathologyTest;
use App\Models\RefUser;
use App\Models\Invoice;
use App\Models\Expense;

use App\Models\PatientPayment;
use App\Models\DoctorPayment;
use App\Models\BrokerPayment;

use App\Models\PatientTestInvoice;
use App\Models\PatientTest;

use App\Models\PrescriptionTicket;

use App\Models\DoctorIncomeHistory;
use App\Models\BrokerIncomeHistory;

use Carbon\Carbon;
use DB;
use Auth;

class CustomerSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //test invoice
    public function testInvoiceCustomSearch(Request $request){
        if($request->from_date != null && $request->to_date != null && $request->invoice_id == null){
            $test_invoice_custom_search = Invoice::whereNotNull('patient_test_invoice_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date);
            })->with('patient','patientTestInvoice','doctor','person')->get();
        }
        else{
            $test_invoice_custom_search = Invoice::whereNotNull('patient_test_invoice_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date)
                    ->where('id',$request->invoice_id);
            })->with('patient','patientTestInvoice','doctor','person')->get();
        }

        if($test_invoice_custom_search->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.       
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }

        if($test_invoice_custom_search->count()>0){
            $net_amount = 0;
            $total_amount = 0;
            foreach($test_invoice_custom_search as $i=>$list){
                $i++;
                $table_data .='<tr class="text-center">'.
                '<td>'.$i.'</td>'.
                '<td>'.$list->invoice_date.'</td>'.
                '<td>'.$list->invoice_no.'</td>'.
                '<td>'.$list->patient->patient_name.'</td>'.
                '<td>'.$list->doctor->name.'</td>'.
                '<td>'.$list->person->ref_user_name.'</td>'.
                '<td>'.$list->total_amount.'</td>'.
                '<td>'.$list->discount.'%'.'</td>'.
                '<td>'.$list->payable_amount.'</td>'.
                '<td class="actions">'.
                '<a href="'.route('patientTests.view', $list->id).'"><i class="fas fa-print text-danger"></i></a>'.
                '<a href="'.route('patientTests.view', $list->id).'"><i class="fas fa-eye text-info"></i></a>'.
                '</td>'.
                '</tr>';

                $net_amount += $list->payable_amount;
                $total_amount += $list->total_amount;
            };

            $tfoot ='<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$net_amount.'</td>'.
            '<td></td>'.
            '<td>'.$total_amount.'</td>'.
            '<td></td>'.

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);

        }
    }

    //prescription custom search
    public function prescriptionCustomSearch(Request $request){
        $table_data ='';
        if($request->from_date != null && $request->to_date != null && $request->invoice_id == null){
            $prescription_ticket_search = Invoice::whereNotNull('prescription_ticket_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date);
            })->with('patient','prescriptonTicket','doctor','person')->get();
            
        }
        // elseif($request->from_date == null && $request->to_date == null && $request->invoice_id != null){
        //     $prescription_ticket_search = Invoice::whereNotNull('prescription_ticket_id')
        //     ->where(function ($query) use ($request) {
        //         $query->where('prescription_ticket_id',$request->invoice_id);
        //     })->with('patient','prescriptonTicket','doctor','person')->get();

        // }
        else{
            $prescription_ticket_search = Invoice::whereNotNull('prescription_ticket_id')
            ->with('patient','prescriptonTicket','doctor','person')->get();
            
        }

        if($prescription_ticket_search->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }
        if($prescription_ticket_search->count()>0){
            $doctor_fees = 0;
            $total_amount = 0;
            foreach($prescription_ticket_search as $i=>$list){
                $i++;
                $table_data .='<tr class="text-center">'.
                '<td>'.$i.'</td>'.
                '<td>'.$list->invoice_date.'</td>'.
                '<td>'.$list->invoice_no.'</td>'.
                '<td>'.$list->patient->patient_name.'</td>'.
                '<td>'.$list->prescriptonTicket->serial_no.'</td>'.
                '<td>'.$list->doctor->name.'</td>'.
                '<td>'.$list->payable_amount.'</td>'.
                '<td>'.$list->discount.'%'.'</td>'.
                '<td>'.$list->total_amount.'</td>'.
                '<td>'.$list->person->ref_user_name.'</td>'.
                '<td class="actions">'.
                '<a href="'.route('prescriptionTicket.view', $list->id).'"><i class="fas fa-print text-danger"></i></a>'.
                '<a href="'.route('prescriptionTicket.view', $list->id).'"><i class="fas fa-eye text-info"></i></a>'.
                '</td>'.
                '</tr>';

                $doctor_fees += $list->payable_amount;
                $total_amount += $list->total_amount;
            };

            $tfoot ='<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$doctor_fees.'</td>'.
            '<td></td>'.
            '<td>'.$total_amount.'</td>'.
            '<td></td>'.
            '<td></td>';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);

        }
    }

    //patient payment custom search
    public function patientPaymentCustomSearch(Request $request){
        $table_data ='';
        if($request->from_date != null && $request->to_date != null && $request->invoice_id == null){
            $patient_payments = PatientPayment::whereNotNull('invoice_id')
            ->where(function ($query) use ($request) {
                $query->where('payment_date','>=',$request->from_date)
                    ->where('payment_date','<=',$request->to_date);
            })->with('invoice')->get();
            
        }

        // elseif($request->from_date == null && $request->to_date == null && $request->invoice_id != null){
        //     $prescription_ticket_search = Invoice::whereNotNull('prescription_ticket_id')
        //     ->where(function ($query) use ($request) {
        //         $query->where('prescription_ticket_id',$request->invoice_id);
        //     })->with('patient','prescriptonTicket','doctor','person')->get();

        // }
        
        else{
            $patient_payments = PatientPayment::whereNotNull('invoice_id')
            ->with('invoice')->get();
        }
       
        if($patient_payments->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }

        if($patient_payments->count()>0){
            $paid_amount = 0;
            $due_amount = 0;
            
            foreach($patient_payments as $i=>$list){
                if($list->invoice->prescription_ticket_id != null){

                    $invoice_type = '<span class="badge-outline col-indigo">Prescription</span>';
                }
                else{

                    $invoice_type = '<span class="badge-outline col-purple">Pathology Test</span>';
                }

                $action='';
                if($list->due_amount == 0){

                    $action ='<span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>';
                }

                else{
                    
                    $payment_check = PatientPayment::where('invoice_id', $list->invoice_id)->orderBy('id','desc')->first();
    
                    if($payment_check->due_amount == 0){
                        $action = '<span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>';
                    }
                    else{
                        $action = '<a type="button" id="make_payment_btn" data-id="'.$list->invoice_id.'" data-due="'.$list->due_amount.'" data-invoice="'.$list->invoice->invoice_no.'" class="btn btn-outline-info">Make&nbsp;Payment</a>';
                    }
                   
                }
                              

                $i++;
                $table_data .='<tr class="text-center">'.
                '<td>'.$i.'</td>'.
                '<td>'.$list->payment_date.'</td>'.
                '<td>'.$list->invoice->invoice_no.'</td>'.
                '<td>'.$invoice_type.'</td>'.
                '<td>'.$list->paid_amount.'</td>'.
                '<td>'.$list->due_amount.'</td>'.
                '<td class="actions">'.$action.'</td>'.
                '</tr>';

                $paid_amount += $list->paid_amount;
                $due_amount += $list->due_amount;
            };

            $tfoot ='<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$paid_amount.'</td>'.
            '<td></td>'.
            '<td></td>';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);

        }
    }

    //doctor payment
    public function doctorPaymentCheckCustomSearch(Request $request){
        $doctor_payment_check = DoctorPayment::where('doctor_id', $request->doctor_id)->where('invoice_date',$request->invoice_date)->first();
        return response()->json($doctor_payment_check); 
    }

    //doctor payment search
    public function doctorPaymentCustomSearch(Request $request){
    
        if($request->from_date != null && $request->to_date != null && $request->doctor_id == null){
            $doctor_payment_custom_search = DoctorIncomeHistory::select('doctor_income_histories.invoice_date',
            'doctor_income_histories.doctor_id', 'doctors.type','doctors.name','doctors.salary_or_contract_fees')
            ->join('doctors', 'doctor_income_histories.doctor_id', '=','doctors.id')
            ->selectRaw('sum(doctor_income_amount) as income_amount')
            ->selectRaw('sum(doctor_payable_amount) as doctor_amount')
            ->where('invoice_date','>=',$request->from_date)
            ->where('invoice_date','<=',$request->to_date)
            ->groupBy('invoice_date','doctor_id')
            ->get();
           
            return response()->json($doctor_payment_custom_search);
        }
        // elseif($request->from_date == null && $request->to_date == null && $request->doctor_id != null){

        //     $doctor_payment_custom_search = DoctorIncomeHistory::select('doctor_income_histories.invoice_date',
        //     'doctor_income_histories.doctor_id', 'doctors.type','doctors.name','doctors.salary_or_contract_fees')
        //     ->join('doctors', 'doctor_income_histories.doctor_id', '=','doctors.id')
        //     ->selectRaw('sum(doctor_income_amount) as income_amount')
        //     ->selectRaw('sum(doctor_payable_amount) as doctor_amount')
        //     ->where('doctor_income_histories.doctor_id', $request->doctor_id)
        //     ->groupBy('invoice_date','doctor_id')
        //     ->get();
           
        //     return response()->json($doctor_payment_custom_search);
        // }
        else{
            $doctor_payment_custom_search = DoctorIncomeHistory::select('doctor_income_histories.invoice_date',
            'doctor_income_histories.doctor_id', 'doctors.type','doctors.name','doctors.salary_or_contract_fees')
            ->join('doctors', 'doctor_income_histories.doctor_id', '=','doctors.id')
            ->selectRaw('sum(doctor_income_amount) as income_amount')
            ->selectRaw('sum(doctor_payable_amount) as doctor_amount')
            ->where('doctor_income_histories.doctor_id', $request->doctor_id)
            ->where('invoice_date','>=',$request->from_date)
            ->where('invoice_date','<=',$request->to_date)
            ->groupBy('invoice_date','doctor_id')
            ->get();
           
            return response()->json($doctor_payment_custom_search);
        }
    }

    //broker payment check
    public function brokerPaymentCheckCustomSearch(Request $request){
        $doctor_payment_check = BrokerPayment::where('broker_id', $request->broker_id)->where('invoice_date',$request->invoice_date)->first();
        return response()->json($broker_payment_check); 
    }

    //broker payment search
    public function brokerPaymentCustomSearch(Request $request){
        if($request->from_date != null && $request->to_date != null && $request->broker_id == null){
            $broker_payments = DB::table('broker_income_histories as I')
            ->select('I.invoice_date', 'I.broker_id','B.ref_user_name')
            ->join('ref_users as B', 'B.id', '=', 'I.broker_id')
            ->selectRaw('sum(I.broker_income_amount) as broker_income_amount')
            ->selectRaw('sum(I.broker_payable_amount) as broker_payable_amount')
            ->where('I.invoice_date','>=',$request->from_date)
            ->where('I.invoice_date','<=',$request->to_date)
            ->groupBy('I.invoice_date','I.broker_id')
            ->get();
        }
        elseif($request->from_date == null && $request->to_date == null && $request->broker_id != null){
            $broker_payments = DB::table('broker_income_histories as I')
            ->select('I.invoice_date', 'I.broker_id','B.ref_user_name')
            ->join('ref_users as B', 'B.id', '=', 'I.broker_id')
            ->selectRaw('sum(I.broker_income_amount) as broker_income_amount')
            ->selectRaw('sum(I.broker_payable_amount) as broker_payable_amount')
            ->where('I.broker_id',$request->broker_id)
            ->groupBy('I.invoice_date','I.broker_id')
            ->get();
        }

        elseif($request->from_date != null && $request->to_date != null && $request->broker_id != null){
            $broker_payments = DB::table('broker_income_histories as I')
            ->select('I.invoice_date', 'I.broker_id','B.ref_user_name')
            ->join('ref_users as B', 'B.id', '=', 'I.broker_id')
            ->selectRaw('sum(I.broker_income_amount) as broker_income_amount')
            ->selectRaw('sum(I.broker_payable_amount) as broker_payable_amount')
            ->where('I.invoice_date','>=',$request->from_date)
            ->where('I.invoice_date','<=',$request->to_date)
            ->where('I.broker_id',$request->broker_id)
            ->groupBy('I.invoice_date','I.broker_id')
            ->get();
        }

        else{
            $broker_payments = DB::table('broker_income_histories as I')
            ->select('I.invoice_date', 'I.broker_id','B.ref_user_name')
            ->join('ref_users as B', 'B.id', '=', 'I.broker_id')
            ->selectRaw('sum(I.broker_income_amount) as broker_income_amount')
            ->selectRaw('sum(I.broker_payable_amount) as broker_payable_amount')
            ->groupBy('I.invoice_date','I.broker_id')
            ->get();
        }
        
        if($broker_payments->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.    
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);

        }

        if($broker_payments->count()>0){
            $table_data= '';
            $income_amount =0;
            $broker_amount =0;
            foreach($broker_payments as $i=>$payment){
                $i++; 

                $check_payment = BrokerPayment::where('broker_id', $payment->broker_id)->where('invoice_date',$payment->invoice_date)->first();
                if($check_payment){
                    $broker_payment_status= '<span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>';
                }
                if($check_payment==null){
                    $broker_payment_status ='<a type="button" id="make_payment_btn" data-id="'.$payment->broker_id.'" data-invoice_date="'.$payment->invoice_date.'" data-payable="'.$payment->broker_payable_amount.'">'.
                    '<span class="btn btn-outline-primary">Make Payment</span>'.
                  '</a>';
                }
                
                $table_data .='<tr class="text-center">'.
                    '<td>'.$i.'</td>'.
                    '<td>'.$payment->invoice_date.'</td>'.
                    '<td>'.$payment->ref_user_name.'</td>'.
                    '<td>'.$payment->broker_income_amount.'</td>'.
                    '<td>'.$payment->broker_payable_amount.'</td>'.
                    '<td>'.$broker_payment_status.'</td>'.
                '</tr>';

                $income_amount += $payment->broker_income_amount;
                $broker_amount += $payment->broker_payable_amount;
                           
            };

            $tfoot='<td></td>'.
                '<td></td>'.
                '<td></td>'.
                '<td>'.$income_amount.'</td>'.
                '<td>'.$broker_amount.'</td>'.
                '<td></td>';
           
            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }
       
    }

    //doctor income search
    public function doctorIncomeCustomSearch(Request $request){
        $table_data = '';
        $income_type = '';
        $commission_type = '';

        if($request->from_date != null && $request->to_date != null && $request->doctor_id == null){

            $doctor_income_history = DoctorIncomeHistory::whereNotNull('doctor_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date);
            })->with('doctor')->get();

        }
        if($request->from_date == null && $request->to_date == null && $request->doctor_id != null){

            $doctor_income_history = DoctorIncomeHistory::whereNotNull('doctor_id')
            ->where(function ($query) use ($request) {
                $query->where('doctor_id',$request->doctor_id);
            })->with('doctor')->get();

        }
        else{
            $doctor_income_history = DoctorIncomeHistory::whereNotNull('doctor_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date)
                    ->where('doctor_id',$request->doctor_id);
            })->with('doctor')->get();

        }       
        if($doctor_income_history->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }

        if($doctor_income_history->count()>0){
            $commission_type = 0;
            $doctor_total_income = 0;
            
            foreach($doctor_income_history as $i=>$list){
                $i = $i+1;
                if($list->prescription_ticket_id != null){
                    $income_type = '<span class="badge-outline col-indigo">Prescription</span>';
                }else{
                    $income_type = '<span class="badge-outline col-purple">Pathology&nbsp;Test</span>';
                }

                if($list->doctor->type == 1){
                    $commission_type = '<span class="badge-outline col-indigo">Salary</span>';
                }elseif($list->doctor->type == 3){
                    $commission_type = '<span class="badge-outline col-purple">Contract Fees</span>';
                }else{
                    $commission_type = $list->doctor_income_amount;
                }

                $table_data .= '<tr class="text-center">'.
                '<td>'.$i.'</td>'.
                '<td>'.$list->invoice_date.'</td>'.
                '<td>'.$list->invoice_no.'</td>'.
                '<td>'.$list->doctor->name.'</td>'.
                '<td>'.$income_type.'</td>'.
                '<td>'.$list->doctor_income_amount.'</td>'.
                '<td>'.$commission_type.'</td>'.
                '</tr>';

                $doctor_total_income += $list->doctor_income_amount;
                $commission_type += $commission_type;
            }
            $tfoot = '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>'.$doctor_total_income.'</td>'.
            '<td>'.$commission_type.'</td>';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($table_data);
        }
    }

    //broker income search
    public function brokerIncomeCustomSearch(Request $request){
        $table_data = '';
      
        if($request->from_date != null && $request->to_date != null && $request->broker_id == null){
            
            $broker_income_history = BrokerIncomeHistory::whereNotNull('broker_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date);
            })->with('broker')->get();
            
        }
        else{
            $broker_income_history = BrokerIncomeHistory::whereNotNull('broker_id')
            ->where(function ($query) use ($request) {
                $query->where('invoice_date','>=',$request->from_date)
                    ->where('invoice_date','<=',$request->to_date)
                    ->where('broker_id',$request->broker_id);
            })->with('broker')->get();
        }

        if($broker_income_history->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }

        if($broker_income_history){
            $total_income =0;
            $total_payable =0;
            foreach($broker_income_history as $i=>$list){
               
                $table_data .= '<tr class="text-center">'.
                '<td>'.$i.'</td>'.
                '<td>'.$list->invoice_date.'</td>'.
                '<td>'.$list->invoice_no.'</td>'.
                '<td>'.$list->broker->ref_user_name.'</td>'.
                '<td>'. $income_type.'</td>'.
                '<td>'.$list->broker_income_amount.'</td>'.
                '<td>'.$list->broker_payable_amount.'</td>'.
                '</tr>';

                $total_income += $list->broker_income_amount;
                $total_payable += $list->broker_payable_amount;
                
            }

            $tfoot = '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>'.$total_income.'</td>'.
            '<td>'.$total_payable.'</td>'.

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }


        // if($request->from_date != null && $request->to_date != null && $request->broker_id == null){
        //     $broker_income_history = BrokerIncomeHistory::whereNotNull('broker_id')
        //     ->where(function ($query) use ($request) {
        //         $query->where('invoice_date','>=',$request->from_date)
        //             ->where('invoice_date','<=',$request->to_date);
        //     })->with('broker')->get();
            
        //     return response()->json($broker_income_history);
        // }
        // else{
        //     $broker_income_history = BrokerIncomeHistory::whereNotNull('broker_id')
        //     ->where(function ($query) use ($request) {
        //         $query->where('invoice_date','>=',$request->from_date)
        //             ->where('invoice_date','<=',$request->to_date)
        //             ->where('broker_id',$request->broker_id);
        //     })->with('broker')->get();
            
        //     return response()->json($broker_income_history);
        // }
            
    }

    //expense search
    public function expenseCustomSearch(Request $request){
        $table_data= '';
        
        if($request->from_date != null && $request->to_date != null){
            $expenses = Expense::select('*')
            ->where('expense_date','>=',$request->from_date)
            ->where('expense_date','<=',$request->to_date)
            ->get();
            $total = Expense::where('expense_date','>=',$request->from_date)->where('expense_date','<=',$request->to_date)->sum('expense_amount');
        }
        
        else{
            $expenses = Expense::latest()->get();
            $total = Expense::sum('expense_amount');
        }
   
        if($expenses->count()==0){
            $table_data ='<tr class="text-center">'.
                '<td></td>'.
                '<td></td>'.
                '<td>No matching records found</td>'.
                '<td></td>'.
                '<td></td>'.
            '</tr>';

            $tfoot = '';
            
            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];

            return response()->json($data);
        }

        if($expenses){
           
            foreach($expenses as $i=>$list){
                $i++; 
                         
                $table_data .='<tr class="text-center">'.
                    '<td>'.$i.'</td>'.
                    '<td>'.$list->expense_date.'</td>'.
                    '<td>'.$list->expense_amount.'</td>'.
                    '<td>'.$list->expense_title.'</td>'.
                    '<td>'.
                    '<a type="button" id="edit" href="'.route('expense.edit',$list->id).'"><i class="fas fa-pencil-alt text-info"></i></a>'.
                    '</td>'.
                '</tr>';
            }

            $tfoot = '<td></td>'.
            '<td><span class="font-weight-bold">Total Expense: </span></td>'.
            '<td><span class="font-weight-bold">'.$total.'</span></td>'.
            '<td></td>'.
            '<td></td>';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
    
        }
    }

    //invoice no field search
    public function invoice_search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $results=DB::table('invoices')
                    ->where('invoice_no','LIKE','%'.$request->search."%")
                    ->get();
            if(count($results)>0)
            {
                foreach ($results as $key => $result) {
                    $output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_invoice" data-invoice_id="'.$result->id.'" data-invoice_no="'.$result->invoice_no.'">
                        <span class="font-weight-bold"> '.$result->invoice_no.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($output);
    }

    //patient name field search
    public function patient_search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $results=DB::table('patients')
                    ->where('patient_name','LIKE','%'.$request->search."%")
                    ->get();
            if(count($results)>0)
            {
                foreach ($results as $key => $result) {
                    $output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_patient" data-patient_id="'.$result->id.'" data-patient_name="'.$result->patient_name.'">
                        <span class="font-weight-bold"> '.$result->patient_name.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($output);
    }

    //doctor name field search
    public function doctor_search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $results=DB::table('doctors')
                    ->where('name','LIKE','%'.$request->search."%")
                    ->where('degrees','LIKE','%'.$request->search."%")
                    ->get();
            if(count($results)>0)
            {
                foreach ($results as $key => $result) {
                    $output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_doctor" data-doctor_id="'.$result->id.'" data-doctor_name="'.$result->name.'">
                        <span class="font-weight-bold"> '.$result->name.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($output);
    }

    //broker name field search
    public function broker_search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $results=DB::table('ref_users')
                    ->where('ref_user_name','LIKE','%'.$request->search."%")
                    ->get();
            if(count($results)>0)
            {
                foreach ($results as $key => $result) {
                    $output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_broker" data-broker_id="'.$result->id.'" data-broker_name="'.$result->ref_user_name.'">
                        <span class="font-weight-bold"> '.$result->ref_user_name.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($output);
    }

    //expense title field search
    public function expense_search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $results=DB::table('expenses')
                    ->where('expense_title','LIKE','%'.$request->search."%")
                    ->get();
            if(count($results)>0)
            {
                foreach ($results as $key => $result) {
                    $output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_expense" data-expense_id="'.$result->id.'" data-expense_title="'.$result->expense_title.'">
                        <span class="font-weight-bold"> '.$result->expense_title.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($output);
    }

    //income custom search
    public function incomeCustomSearch(Request $request){
        $table_data= '';
        if($request->from_date != null && $request->to_date != null){
            $total_incomes = PatientPayment::select('payment_date')
            ->selectRaw('sum(paid_amount) as total_income')
            ->where('payment_date','>=',$request->from_date)
            ->where('payment_date','<=',$request->to_date)
            ->groupBy('payment_date')->get();

            $total = PatientPayment::where('payment_date','>=',$request->from_date)->where('payment_date','<=',$request->to_date)->sum('paid_amount');
        }
      
        else{
            $total_incomes = PatientPayment::select('payment_date')
            ->selectRaw('sum(paid_amount) as total_income')
            ->groupBy('payment_date')->get();

            $total = PatientPayment::sum('paid_amount');
        }
   
        if($total_incomes->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td>No matching records found</td>'.
            '<td></td>'.
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }

        if($total_incomes){
           
            foreach($total_incomes as $i=>$list){
                $i++; 
                         
                $table_data .='<tr class="text-center">'.
                    '<td>'.$i.'</td>'.
                    '<td>'.$list->payment_date.'</td>'.
                    '<td>'.$list->total_income.'</td>'.
                '</tr>';
                           
            }

            $tfoot = '<td></td>'.
            '<td>Total Income : </td>'.
            '<td>'.$total.'</td>';
           
            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }
       
    }
    
    //income report custom search
    public function incomeReportCustomSearch(Request $request){
        $doctor_paid='';
        $table_data= '';
        $total_of_income =0;
        $total_of_expense = 0;
        $total_of_doctor_paid = 0;
        $total_of_broker_paid = 0;
        $total_of_profit_or_loss = 0;
        $doctor_paid_amount = 0;

        if($request->from_date != null && $request->to_date != null){
            $doctor_paid = DoctorPayment::select('invoice_date')
            ->selectRaw('sum(paid_amount) as doctor_paid_amount')
            ->where('invoice_date','>=',$request->from_date)
            ->where('invoice_date','<=',$request->to_date)
            ->groupBy('invoice_date')
            ->get();
        }
      
        else{
            $doctor_paid = DoctorPayment::select('invoice_date')
            ->selectRaw('sum(paid_amount) as doctor_paid_amount')
            ->groupBy('invoice_date')
            ->get();
        }
        
        if($doctor_paid->count()==0){
            $table_data ='<tr class="text-center">'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td width="30%">No matching records found</td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '</tr>';

            $tfoot = '';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
        }

        if($doctor_paid->count()>0){
           
            foreach($doctor_paid as $i=>$list){
                $i++; 

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

                $table_data .='<tr class="text-center">'.
                    '<td>'.$i.'</td>'.
                    '<td>'.$list->invoice_date.'</td>'.
                    '<td>'.$total_income.'</td>'.
                    '<td>'.$list->doctor_paid_amount.'</td>'.
                    '<td>'.$broker_paid.'</td>'.
                    '<td>'.$expense.'</td>'.
                    '<td>'.$profit_or_loss.'</td>'.
                '</tr>';      
            };

            $tfoot ='<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$total_of_income.'</td>'.
            '<td>'.$total_of_doctor_paid.'</td>'.
            '<td>'.$total_of_broker_paid.'</td>'.
            '<td>'.$total_of_expense.'</td>'.
            '<td>'.$total_of_profit_or_loss.'</td>';

            $data =[
                'tbody'=>$table_data,
                'tfoot'=>$tfoot
            ];
            
            return response()->json($data);
           
        }
       
    }

}
