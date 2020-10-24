<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\PathologyTest;
use App\Models\RefUser;
use App\Models\Invoice;
use App\Models\PatientPayment;
use App\Models\PatientTestInvoice;
use App\Models\PatientTest;
use App\Models\DoctorIncomeHistory;
use App\Models\BrokerIncomeHistory;
use Carbon\Carbon;
use DB;
use Auth;
use DataTables;
use Validator;
class PatientTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient_tests = Invoice::whereNotNull('patient_test_invoice_id')->latest()->get();

        if($patient_tests->count()>0){
            $net_amount = 0;
            $total_amount = 0;

            foreach($patient_tests as $i=>$list){
                $net_amount += $list->payable_amount;
                $total_amount += $list->total_amount;
            };

            $total_count ='<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td></td>'.
            '<td>Total : </td>'.
            '<td>'.$net_amount.'</td>'.
            '<td></td>'.
            '<td>'.$total_amount.'</td>'.
            '<td></td>';
            
        }
        
        else{
            $total_count = '';
        }

        return view('admin.pages.patient_tests.list', compact('patient_tests','total_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $tests = PathologyTest::all();
        return view('admin.pages.patient_tests.patient_test_create', compact('doctors','tests'));
    }

    public function search_patient(Request $request)
    {
        if($request->ajax())
        {
            $patient_output="";
            $patients=DB::table('patients')
                        ->where('patient_id','LIKE','%'.$request->search."%")
                        ->orWhere('patient_name','LIKE','%'.$request->search."%")
                        ->orWhere('patient_mobile','LIKE','%'.$request->search."%")
                        ->orWhere('created_at','LIKE','%'.$request->search."%")
                        ->get();
            if(count($patients)>0)
            {
                foreach ($patients as $key => $patient) {
                    $patient_output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_patient" data-id="'.$patient->id.'" data-pid="'.$patient->patient_id.'" data-name="'.$patient->patient_name.'" data-mobile="'.$patient->patient_mobile.'" data-age="'.$patient->patient_age.'" data-gender="'.$patient->patient_gender.'"  data-address="'.$patient->patient_address.'"  data-note="'.$patient->patient_note.'">
                        <span class="font-weight-bold text-danger">'.$patient->patient_id.'</span>
                        <br>
                        <span class="font-weight-bold">'.$patient->patient_name.'</span>
                        <br>
                        <span class="text-info">'.$patient->patient_mobile.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $patient_output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Patient Not Found</a>'.
                '</div>';
            }
        }    
        return Response($patient_output);
    }
    public function search_test(Request $request)
    {
        if($request->ajax())
        {
            $test_output="";
            $tests=DB::table('pathology_tests')
                        ->where('test_name','LIKE','%'.$request->search."%")
                        ->orWhere('test_code','LIKE','%'.$request->search."%")
                        ->get();
            if(count($tests)>0)
            {
                foreach ($tests as $key => $test) {
                    $test_output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_test" data-id="'.$test->id.'" data-code="'.$test->test_code.'" data-name="'.$test->test_name.'" data-price="'.$test->test_price.'" data-discount="'.$test->patient_discount.'" data-room="'.$test->test_room.'" data-duration="'.$test->test_duration.'">
                        <span class="font-weight-bold">'.$test->test_name.'</span>
                        <br>
                        <span class="text-info">Test Rate : '.$test->test_price.'</span>
                        <br>
                        <span class="text-success">Test Duration : '.$test->test_duration.' <small>Day(s)</small></span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $test_output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Test Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($test_output);
    }

    public function search_doctor(Request $request)
    {
        if($request->ajax())
        {
            $doctor_output="";
            $doctors = Doctor::where('type','!=','4')->where('leave_or_present_status','1');
            $doctors=DB::table('doctors')
                    ->where('doctor_id','LIKE','%'.$request->search."%")
                    ->orWhere('name','LIKE','%'.$request->search."%")
                    ->orWhere('degrees','LIKE','%'.$request->search."%")
                    ->get();

            if(count($doctors)>0)
            {
                foreach ($doctors as $key => $doctor) {
                    $doctor_output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_doctor" data-id="'.$doctor->id.'" data-name="'.$doctor->name.'" data-degrees="'.$doctor->degrees.'">
                        <span class="font-weight-bold">'.$doctor->name.'</span>
                        <br>
                        <span class="text-info">'.$doctor->degrees.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $doctor_output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Doctor Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($doctor_output);
    }

    public function search_person(Request $request)
    {
        if($request->ajax())
        {
            $person_output="";
            $persons=DB::table('ref_users')
                    ->where('ref_user_name','LIKE','%'.$request->search."%")
                    ->orWhere('ref_user_mobile','LIKE','%'.$request->search."%")
                    ->orWhere('ref_user_id','LIKE','%'.$request->search."%")
                    ->get();
            if(count($persons)>0)
            {
                foreach ($persons as $key => $person) {
                    $person_output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_person" data-id="'.$person->id.'" data-name="'.$person->ref_user_name.'" data-mobile="'.$person->ref_user_mobile.'">
                        <span class="font-weight-bold"> '.$person->ref_user_name.'</span>
                        <br>
                        <span class="text-info"> '.$person->ref_user_mobile.'</span>
                    </a>'.
                    '</div>';
                }
            }
            else{
                $person_output='<div class="list-group">'.
                '<a type="button" class="list-group-item list-group-item-action text-danger">Ref. Person Not Found ...</a>'.
                '</div>';
            }
        }    
        return Response($person_output);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'test_date' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'delivery_date' => 'required',
            'test_ids' => 'required',
            'test_prices' => 'required',
            'test_discounts' => 'required',
            'test_net_amounts' => 'required',

            'payable_amount' => 'required',
            'discount' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'due_amount' => 'required',
        ]);

        $current_date = Carbon::now()->format('Y-m-d');
        
        $patient_test_invoice = PatientTestInvoice::create([
            'test_date' => $current_date,
            'patient_id' => $validatedData['patient_id'],
            'doctor_id' => $validatedData['doctor_id'],
            'person_id' => request('person_id'),
        ]);

        //$ticket_serial_no = PrescriptionTicket::where('ticket_date',$current_date)->count();
        
        for ($i = 0; $i < count($validatedData['test_ids']); $i++) {
            $patient_test = PatientTest::create([
                'test_date' => $current_date,
                'patient_test_invoice_id' => $patient_test_invoice->id,
                'delivery_date' => $validatedData['delivery_date'],
                'test_id' => $validatedData['test_ids'][$i],
                'test_price' => $validatedData['test_prices'][$i],
                'test_discount' => $validatedData['test_discounts'][$i],
                'test_net_amount' => $validatedData['test_net_amounts'][$i],
            ]);
        }

        $prefix = 'RH';
        $ticket_invoice_uuid = '';
        $current_year = Carbon::now()->format('y');
        $current_month = Carbon::now()->format('m');
        $initial_seq = 1;
        $invoice_no = Invoice::count();
        //dd($invoice_no);
        if($invoice_no == 0){
            $ars = sprintf("%02d", $initial_seq);
            $ticket_invoice_uuid = $prefix.$current_year.$current_month.$ars;
            
        }else{
            $last_invoice_id = Invoice::latest()->first()->invoice_no;
            $numeric = substr("$last_invoice_id", 2);
            $year = substr("$numeric",0, 2);
            $month = substr("$numeric", 2, 2);  
            $seq = substr("$numeric", 4);
            //dd($seq);
            

            if($year == $current_year){
                if($month == $current_month){
                    $insert_id = "$seq"+1;
                    //dd($insert_id);
                    $ars = sprintf("%02d", $insert_id);
                    $ticket_invoice_uuid = $prefix.$year.$month.$ars;
                }else{
                    $ars = sprintf("%02d", $initial_seq);
                    $ticket_invoice_uuid = $prefix.$year.$current_month.$ars;
                }
            }else{
                $ars = sprintf("%02d", $initial_seq);
                $ticket_invoice_uuid = $prefix.$current_year.$current_month.$ars;
            }
        }

        $invoice = Invoice::create([
            'invoice_date' => $current_date,
            'invoice_no' => $ticket_invoice_uuid,
            'patient_test_invoice_id' => $patient_test_invoice->id,
            'patient_id' => $validatedData['patient_id'],
            'doctor_id' => $validatedData['doctor_id'],
            'person_id' => request('person_id'),
            'payable_amount' => $validatedData['payable_amount'],
            'discount' => $validatedData['discount'],
            'total_amount' => $validatedData['total_amount'],
        ]);

        $doctor_payable = Doctor::find($validatedData['doctor_id']);
        $doctor_test_commission = ($validatedData['total_amount'] * $doctor_payable->test_commission) / 100;
        $doctor_income_history = DoctorIncomeHistory::create([
            'invoice_date' => $current_date,
            'invoice_no' => $ticket_invoice_uuid,
            'invoice_id' => $invoice->id,
            'patient_test_invoice_id' => $patient_test_invoice->id,
            'doctor_id' => $validatedData['doctor_id'],
            'doctor_income_amount' => $validatedData['total_amount'],
            'doctor_payable_amount' => $doctor_test_commission,
        ]);

        //dd($patient_test_invoice->id);
        if(!empty(request('person_id'))){
            $broker_test_commission = ($validatedData['total_amount'] * 5) / 100;
            $broker_income_history = BrokerIncomeHistory::create([
                'invoice_date' => $current_date,
                'invoice_no' => $ticket_invoice_uuid,
                'patient_test_invoice_id' => $patient_test_invoice->id,
                'broker_id' => request('person_id'),
                'broker_income_amount' => $validatedData['total_amount'],
                'broker_payable_amount' => $broker_test_commission,
            ]);
        }
       
        $patient_payment = PatientPayment::create([
            'payment_date' => $current_date,
            'invoice_id' => $invoice->id,
            'paid_amount' => $validatedData['paid_amount'],
            'due_amount' => $validatedData['due_amount'],
        ]);
        
        $test_invoice_id = $invoice->id;
        $patient_test_id = $patient_test_invoice->id;
        $patient_payment_id = $patient_payment->id;
        //$patient_payment_id = $patient_payment->id;
        return redirect()->route('patientTests.print', ['test_invoice_id'=>$test_invoice_id]);
        // return response()->json(['success' => 'New Test Invoice is created successfully.']);
    }

    public function new_patient(Request $request){
        $rules = array(
            'patient_name'          =>  'required|string|max:50',
            'patient_mobile'        =>  'required|numeric',
            'patient_age'           =>  'required|numeric',
            'patient_gender'        =>  'required|numeric',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $new_patient = array(
            'patient_id'                => 'P-'.time(),
            'patient_name'              => ucwords(request('patient_name')),
            'patient_mobile'            => request('patient_mobile'),
            'patient_age'               => request('patient_age'),
            'patient_gender'            => request('patient_gender'),
            'patient_address'           => request('patient_address'),
            'patient_note'              => request('patient_note'),
            'user_id'                   => Auth::user()->id
        );

        $patient = Patient::create($new_patient); 

        $data =[
            'success' => 'New Patient Added successfully.',
            'patient'=> $patient
        ];

        return response()->json($data);
    }

    public function new_doctor(Request $request){
        $rules = array(
            'doctor_name'           =>  'required|string|max:50',
            'doctor_degrees'        =>  'required|string|max:100',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $doctor_data = array(
            'doctor_id'          => 'D-'.time(),
            'type'               => '4',
            'name'               => ucwords(request('doctor_name')),
            'degrees'            => request('doctor_degrees'),
            'user_id'            => Auth::user()->id
        );

        $doctor = Doctor::create($doctor_data);  

        $data =[
            'success' => 'New Doctor Added successfully.',
            'doctor'=> $doctor
        ];

        return response()->json($data);
    }

    //broker
    public function new_user(Request $request){
        $rules = array(
            'ref_person_name'           =>  'required|string|max:50',
            'ref_person_mobile'         =>  'required|numeric',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $ref_person_data = array(
            'ref_user_id'               =>'B-'.time(),
            'ref_user_name'             =>ucwords(request('ref_person_name')),
            'ref_user_mobile'           => request('ref_person_mobile'),
            'ref_user_note'             => request('ref_person_note'),
            'user_id'                   => Auth::user()->id
        );

        $broker = RefUser::create($ref_person_data);  

        $data =[
            'success' => 'New Broker Added successfully.',
            'broker'=> $broker
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test_invoice = Invoice::findOrFail($id);
        $patient_tests = PatientTest::where('patient_test_invoice_id',$test_invoice->patient_test_invoice_id)->get();
        $patient_payments = PatientPayment::where('invoice_id',$test_invoice->id)->get();
        //dd($patient_payment);
        return view('admin.pages.patient_tests.show', compact('test_invoice','patient_payments','patient_tests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print($test_invoice_id){
        $test_invoice = Invoice::findOrFail($test_invoice_id);
        $patient_tests = PatientTest::where('patient_test_invoice_id',$test_invoice->patient_test_invoice_id)->get();
        $patient_payments = PatientPayment::where('invoice_id',$test_invoice->id)->get();
        //dd($test_invoice);
        return view('admin.pages.patient_tests.print', compact('test_invoice','patient_payments','patient_tests'));
    }
}
