<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\PrescriptionTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\RefUser;
use App\Models\Invoice;
use App\Models\Room;
use App\Models\PatientPayment;
use App\Models\DoctorIncomeHistory;
use App\Models\BrokerIncomeHistory;
use DB;
use Auth;
use DataTables;
use Validator;

class PrescriptionTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Invoice::whereNotNull('prescription_ticket_id')->get();
        
       
        if($tickets->count()>0){
            $doctor_fees = 0;
            $total_amount = 0;

            foreach($tickets as $i=>$list){
                $doctor_fees += $list->payable_amount;
                $total_amount += $list->total_amount;
            };

            $total_count ='<td></td>'.
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

        }
        else{
            $total_count ='';
        }

        return view('admin.pages.prescription_ticket.list', compact('tickets','total_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.pages.prescription_ticket.create', compact('doctors'));
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
            'ticket_date' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'doctor_fees' => 'required',
            'discount_amount' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'due_amount' => 'required',
        ]);

        // $current_date = Carbon::now()->format('Y-m-d');
        $current_date = $validatedData['ticket_date'];
        $ticket_serial_no = PrescriptionTicket::where('ticket_date',$current_date)->where('doctor_id',$validatedData['doctor_id'])->count();
        
        $ticket_serial_no = $ticket_serial_no + 1;
   

        $prescription_ticket = PrescriptionTicket::create([
            'ticket_date' => $validatedData['ticket_date'],
            'serial_no' => $ticket_serial_no,
            'patient_id' => $validatedData['patient_id'],
            'doctor_id' => $validatedData['doctor_id'],
            'person_id' => request('person_id'),
            'doctor_fees' => $validatedData['doctor_fees'],
            'discount' => $validatedData['discount_amount'],
            'total_amount' => $validatedData['total_amount'],
        ]);

        $prefix = 'RH';
        $ticket_invoice_uuid = '';
        $current_year = Carbon::now()->format('y');
        $current_month = Carbon::now()->format('m');
        $initial_seq = 1;
        $invoice_no = Invoice::count();
     
        if($invoice_no == 0){
            $ars = sprintf("%02d", $initial_seq);
            $ticket_invoice_uuid = $prefix.$current_year.$current_month.$ars;
            
        }else{
            $last_invoice_id = Invoice::latest()->first()->invoice_no;
            $numeric = substr("$last_invoice_id", 2);
            $year = substr("$numeric",0, 2);
            $month = substr("$numeric", 2, 2);  
            $seq = substr("$numeric", 4);

            if($year == $current_year){
                if($month == $current_month){
                    $insert_id = "$seq"+1;
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
        
        dd($ticket_invoice_uuid);
        //$invoice_no = $invoice_no + 1;

        $ticket_invoice = Invoice::create([
            'invoice_date' => $current_date,
            'invoice_no' => $ticket_invoice_uuid,
            'prescription_ticket_id' => $prescription_ticket->id,
            'patient_id' => $validatedData['patient_id'],
            'doctor_id' => $validatedData['doctor_id'],
            'person_id' => request('person_id'),
            'payable_amount' => $validatedData['doctor_fees'],
            'discount' => $validatedData['discount_amount'],
            'total_amount' => $validatedData['total_amount'],
        ]);
        //dd($ticket_invoice->id);

        $doctor_payable = Doctor::find($validatedData['doctor_id']);
        $doctor_income_history = DoctorIncomeHistory::create([
            'invoice_date' => $current_date,
            'invoice_no' => $ticket_invoice_uuid,
            'invoice_id' => $ticket_invoice->id,
            'prescription_ticket_id' => $prescription_ticket->id,
            'doctor_id' => $validatedData['doctor_id'],
            'doctor_income_amount' => $validatedData['total_amount'],
            'doctor_payable_amount' => $doctor_payable->prescription_payable,
        ]);
            

        if(!empty(request('peson_id'))){
            $broker_test_commission = ($validatedData['total_amount'] * 5) / 100;
            $broker_income_history = BrokerIncomeHistory::create([
                'invoice_date' => $current_date,
                'invoice_no' => $ticket_invoice_uuid,
                'prescription_ticket_id' => $prescription_ticket->id,
                'broker_id' => request('person_id'),
                'broker_income_amount' => $validatedData['total_amount'],
                'broker_payable_amount' => $broker_test_commission,
            ]);
        }
            //dd($ticket_invoice->id);
            //$ticket_invoice_id = 7;
        $patient_payment = PatientPayment::create([
            'payment_date' => $current_date,
            'invoice_id' => $ticket_invoice->id,
            'paid_amount' => $validatedData['paid_amount'],
            'due_amount' => $validatedData['due_amount'],
        ]);

        $ticket_invoice_id = $ticket_invoice->id;
        $patient_payment_id = $patient_payment->id;
            
        Session::flash('success','New Prescription ticket  Added successfully');
        return redirect()->route('prescriptionTicket.print', ['ticket_invoice_id'=>$ticket_invoice_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\PrescriptionTicket  $prescriptionTicket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_invoice_id)
    {
        //dd($ticket_invoice_id);
        $ticket_invoice = Invoice::findOrFail($ticket_invoice_id);
        $patient_payments = PatientPayment::where('invoice_id',$ticket_invoice->id)->get();
        //dd($patient_payment);
        return view('admin.pages.prescription_ticket.show', compact('ticket_invoice','patient_payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\PrescriptionTicket  $prescriptionTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(PrescriptionTicket $prescriptionTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\PrescriptionTicket  $prescriptionTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrescriptionTicket $prescriptionTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\PrescriptionTicket  $prescriptionTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrescriptionTicket $prescriptionTicket)
    {
        //
    }

    public function print_ticket($ticket_invoice_id){
        $ticket_invoice = Invoice::findOrFail($ticket_invoice_id);
        $patient_payments = PatientPayment::where('invoice_id',$ticket_invoice->id)->get();
        return view('admin.pages.prescription_ticket.print', compact('ticket_invoice','patient_payments'));
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

    public function new_broker(Request $request){
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
   
    public function search_doctor(Request $request)
    {
        if($request->ajax())
        {
            
            $doctor_output="";

            $doctors = Doctor::where('type','!=','4')->where('leave_or_present_status','1')->latest()->limit('10')
            ->where(function ($query) use ($request) {
                $query->where('doctor_id','LIKE','%'.$request->search."%")
                ->orWhere('name','LIKE','%'.$request->search."%")
                ->orWhere('degrees','LIKE','%'.$request->search."%");
            })->get();

            // $doctor_lists = Doctor::where('type','!=','4')->where('leave_or_present_status','1')->latest()->get();
            // $doctors = $doctor_lists
            // ->where('doctor_id','LIKE','%'.$request->search."%")
            // ->orWhere('name','LIKE','%'.$request->search."%")
            // ->orWhere('degrees','LIKE','%'.$request->search."%")
            // ->get();

            if(count($doctors)>0)
            {
                foreach ($doctors as $key => $doctor) {

                    $current_date = $request->ticket_date;
                    $ticket_serial_no = PrescriptionTicket::where('ticket_date',$current_date)->where('doctor_id',$doctor->id)->count();
                    $ticket_serial_no = $ticket_serial_no + 1;

                    $doctor_chamber = Room::where('id',$doctor->chamber_id)->first();

                    $leave_present_status = $doctor->leave_or_present_status;
                    if($leave_present_status==1){
                        $note = '<span class="text-info text-success">'.$doctor->leave_or_present_note.'</span>';
                    }
                    if($leave_present_status==0){
                        $note = '<span class="text-info text-danger">'.$doctor->leave_or_present_note.'</span>';
                    }
                    //$chamber = $doctor->chamber->code;
                  
                    $doctor_output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_doctor" data-serial_no="'.$ticket_serial_no.'" data-id="'.$doctor->id.'" data-name="'.$doctor->name.'" data-fees="'.$doctor->prescription_fees.'" data-chamber="'.$doctor_chamber->code.'">
                        <span class="font-weight-bold">'.$doctor->name.'</span>
                        <br>
                        <span class="text-info">'.$doctor->degrees.'</span>
                        <br>
                        '.$note.'
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


}
