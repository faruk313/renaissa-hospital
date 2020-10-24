<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\RefUser;
use DB;
use Auth;
use DataTables;
use Validator;
class PatientAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = RefUser::all();

        return response()->json($tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.patient_appointments.patient_appointment_create');
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
            $doctors=DB::table('doctors')
                    ->where('name','LIKE','%'.$request->search."%")
                    // ->orWhere('doctor_id','LIKE','%'.$request->search."%")
                    // ->orWhere('degrees','LIKE','%'.$request->search."%")
                    ->whereNotIn('type',[4])
                    ->where('status', 1)
                    ->where('leave_or_present_status', 1)
                    ->get();
            if(count($doctors)>0)
            {
                foreach ($doctors as $key => $doctor) {
                    $leave_present_status = $doctor->leave_or_present_status;
                    if($leave_present_status==1){
                        $note = '<span class="text-info text-success">'.$doctor->leave_or_present_note.'</span>';
                    }
                    if($leave_present_status==0){
                        $note = '<span class="text-info text-danger">'.$doctor->leave_or_present_note.'</span>';
                    }
                    $doctor_output.='<div class="list-group">'.
                    '<a type="button" class="list-group-item list-group-item-action" id="add_doctor" data-id="'.$doctor->id.'" data-name="'.$doctor->name.'" data-fees="'.$doctor->prescription_fees.'" data-chamber="'.$doctor->chamber_id.'">
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
            'patient_id'                => generateUniqueID('P',Patient::latest('id')->first()),
            'patient_name'              => ucwords(request('patient_name')),
            'patient_mobile'            => request('patient_mobile'),
            'patient_age'               => request('patient_age'),
            'patient_gender'            => request('patient_gender'),
            'patient_address'           => request('patient_address'),
            'patient_note'              => request('patient_note'),
            'user_id'                   => Auth::user()->id
        );

        Patient::create($new_patient);  

        return response()->json(['success' => 'New Patient Added successfully.']);
    }

    // public function new_doctor(Request $request){
    //     $rules = array(
    //         'doctor_name'           =>  'required|string|max:50',
    //         'doctor_degrees'        =>  'required|string|max:100',
    //     );

    //     $error = Validator::make($request->all(), $rules);

    //     if($error->fails())
    //     {
    //         return response()->json(['errors' => $error->errors()->all()]);
    //     }
    //     $doctor_data = array(
    //         'doctor_id'          => generateUniqueID('D',Doctor::all()->last()->id),
    //         'type'               => '4',
    //         'name'               => ucwords(request('doctor_name')),
    //         'degrees'            => request('doctor_degrees'),
    //         'user_id'            => Auth::user()->id
    //     );

    //     Doctor::create($doctor_data);  

    //     return response()->json(['success' => 'New Doctor Added successfully.']);
    // }

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
            'ref_user_id'               =>generateUniqueID('B',RefUser::all()->last()->id),
            'ref_user_name'             =>ucwords(request('ref_person_name')),
            'ref_user_mobile'           => request('ref_person_mobile'),
            'ref_user_note'             => request('ref_person_note'),
            'user_id'                   => Auth::user()->id
        );

        RefUser::create($ref_person_data);  

        return response()->json(['success' => 'New Broker Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
