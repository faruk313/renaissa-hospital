<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Patient;
use Auth;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->get();
        return view ('admin.pages.patients.patient_lists',compact('patients'));
    }

    public function create(){
        return view('admin.pages.patients.patient_create');
    }

    public function store(Request $request){
        $request->validate([
            'patient_name'          =>  'required|string|max:50',
            'patient_mobile'        =>  'required|numeric',
            'patient_age'           =>  'required|numeric',
            'patient_gender'        =>  'required|numeric',
            'patient_status'        =>  'required|bool'
        ]);
        
        $last_id = Patient::latest()->pluck('id')->first();
        $patient_uid = generateUniqueID('P',$last_id);

        $insert_data = array(
            'patient_uid'           => $patient_uid,
            'patient_name'          => ucwords(request('patient_name')),
            'patient_mobile'        => request('patient_mobile'),
            'patient_age'           => request('patient_age'),
            'patient_gender'        => request('patient_gender'),
            'patient_address'       => request('patient_address'),
            'patient_note'          => request('patient_note'),
            'patient_status'        => request('patient_status'),
            'user_id'               => Auth::user()->id
        );


        Patient::create($insert_data);

        Session::flash('success','New Patient Added successfully');
        return redirect()->route('patients.lists');

    }

    public function show(Request $request,$id)
    {
        if(request()->ajax())
        {
            $result = Patient::findOrFail($id);
            if($result){
                $user = $result->user;
                $data = [
                    'result' => $result,
                    'user' => $user,
                ];
                return response()->json($data);
            }
            else{
                Session::flash('error','No Patient Info. Found');
                return redirect()->back();
            }
        }
    }

    public function edit(Request $request,$id)
    {
        $patient = Patient::findOrFail($id);
        if($patient){
            return view('admin.pages.patients.patient_edit',compact('patient'));
        }
        else{
            return response()->json(['error' => 'No Patient Info. Found']);
        }
    }

    public function update(Request $request, $id){

        $patient = Patient::findOrFail($id);
        $this->validate($request,[
            'patient_name'          =>  'required|string|max:50',
            'patient_mobile'        =>  'required|numeric',
            'patient_age'           =>  'required|numeric',
            'patient_gender'        =>  'required|numeric',
            'patient_status'        =>  'required|bool'
        ]);

 
        $update_data = array(
            'patient_name'          => ucwords(request('patient_name')),
            'patient_mobile'        => request('patient_mobile'),
            'patient_age'           => request('patient_age'),
            'patient_gender'        => request('patient_gender'),
            'patient_address'       => ucwords(request('patient_address')),
            'patient_note'          => ucwords(request('patient_address')),
            'patient_status'        => request('patient_status'),
            'user_id'               => Auth::user()->id
        );

        $patient->update($update_data);   

        Session::flash('info','Patient Info. Updated successfully...');
        return redirect()->route('patients.lists');

        // return response()->json(['success' => 'Patient Info. Updated successfully.']);
    }

    public function destroy($id)
    {
        $delete = Patient::findOrFail($id);
        if(!empty($delete)){
            $delete->delete();
            Session::flash('warning','Patient Info. Deleted successfully...');
        }
        else{
            Session::flash('error','Patient Info. Not Found...');
            return response()->json(['warning' => 'Patient Info. Not Found']);
        }
        
        return redirect()->route('patients.lists');
        
    }
}
