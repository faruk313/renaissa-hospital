<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\DoctorDepartment;
use Auth;
use Validator;
use DataTables;
use Image;
class DoctorController extends Controller
{
    public function lists(){
        
        $doctor_chambers = room::where('type','2')->where('status',true)->get();
        $doctor_departments = DoctorDepartment::where('doctor_department_status',true)->get();
        $doctors = Doctor::latest()->get();

        return view ('admin.pages.doctors.doctor_lists', compact('doctor_chambers','doctor_departments','doctors'));
        // if($request->ajax())
        // {
        //     $data = Doctor::latest()->get();
        //     return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->editColumn('name', function ($data) 
        //     {
        //         $name ='<a type="button" data-id="'.$data->id.'" id="view">'.$data->name.'</a>';
        //         return $name;
            
        //     })
        //     ->editColumn('type', function ($data) 
        //     {
        //         $type = $data->type;
        //         if($type==1){
        //             return $type='<span class="badge-outline col-green">Indoor</span>';
        //         }
        //         elseif($type==2){
        //             return $type='<span class="badge-outline col-purple">Outdoor</span>';
        //         }
        //         elseif($type==3){
        //             return $type='<span class="badge-outline col-blue">Contractual</span>';
        //         }
        //         elseif($type==4){
        //             return $type='<span class="badge-outline col-red">Outside</span>';
        //         }
        //         else{
        //             return $type="Not Found";
        //         }
        //     })
        //     ->editColumn('leave_or_present_status', function ($data) 
        //     {

        //         if($data->type ==4){
        //             return $data->leave_or_present_status = '<span class="badge-outline col-orange">N/A</span>';
        //         }
        //         return $data->leave_or_present_status == 1? '<a type="button" id="leavePresent" data-id="'.$data->id.'" class="btn btn-outline-primary">Present</a>':'<a type="button" id="leavePresent" data-id="'.$data->id.'" class="btn btn-outline-danger">Leave</a>';
        //     })
        //     ->editColumn('status', function ($data) 
        //     {
        //         return $data->status == 1? '<span class="badge-outline col-green">Active</span>':'<span class="badge-outline col-red">Inactive</span>';
        //     })
        //     ->addColumn('actions', function($data){       
        //         $button = '<a type="button" id="view" data-id="'.$data->id.'" class="view"><i class="far fa-eye text-success"></i></a>';
        //         $button .= '<a type="button" id="edit" data-id="'.$data->doctor_id.'" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>';
        //         $button .= '<a type="button" id="delete" data-id="'.$data->id.'" class="delete"><i class="far fa-trash-alt text-danger"></i></a>';
        //         return $button;
        //     })->rawColumns(['actions'])->escapeColumns([])->make(true);
        // }
        // return view ('admin.pages.doctors.doctor_lists', compact('doctor_chambers','doctor_departments'));
       
    }

    public function create(){
        $doctor_chambers = room::where('type','2')->where('status',true)->get();
        $doctor_departments = DoctorDepartment::where('doctor_department_status',true)->get();
        return view('admin.pages.doctors.doctor_create', compact('doctor_chambers','doctor_departments'));
    }

    public function store(Request $request){

       
        $rules = array(
            'doctor_type'               =>  'required|numeric',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $doctor_type = request('doctor_type');
      
        if($request->hasFile('doctor_photo')){
            $this->validate($request, [
                'doctor_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2024'
            ]);

            $file = $request->file('doctor_photo');
            $fileName = 'doctor_'.time().'.'.$file->getClientOriginalExtension();
            $uploadPath = 'public/uploads/doctors/';
            $img = Image::make($file->getRealPath())->resize(165,155);
            $img->save($uploadPath.$fileName);
            $data = array(
                'doctor_id'                          => $doctor_id,
                'type'                               => request('doctor_type'),
                'prescription_fees'                  => request('doctor_prescription_fees'),
                'prescription_payable'               => request('doctor_prescription_payable'),
                'report_fees'                        => request('doctor_report_fees'),
                'report_payable'                     => request('doctor_report_payable'),
                'salary_or_contract_fees'            => request('doctor_salary_or_contract_fees'),
                'test_commission'                    => request('doctor_test_commission'),
                'name'                               => ucwords(request('doctor_name')),
                'email'                              => request('doctor_email'),
                'mobile'                             => request('doctor_mobile'),
                'photo'                              => $fileName,
                'dob'                                => request('doctor_dob'),
                'gender'                             => request('doctor_gender'),
                'department_id'                      => request('doctor_department'),
                'chamber_id'                         => request('doctor_chamber'),
                'mailing_address'                    => request('doctor_mailing_address'),
                'permanent_address'                  => request('doctor_permanent_address'),
                'degrees'                            => ucwords(request('doctor_degrees')),
                'present_institute'                  => request('doctor_present_institute'),
                'institute_designation'              => request('doctor_institute_designation'),
                'institute_address'                  => request('doctor_institute_address'),
                'joining_date'                       => request('doctor_joining_date'),
                'status'                             => request('doctor_status'),
                'leave_or_present_status'            => request('doctor_leave_or_present_status'),
                'leave_or_present_note'              => request('doctor_leave_or_present_note'),
                'user_id'                            => Auth::user()->id
            );
        }
        else{
            $data = array(
                'doctor_id'                          => 'D-'.time(),
                'type'                               => request('doctor_type'),
                'prescription_fees'                  => request('doctor_prescription_fees'),
                'prescription_payable'               => request('doctor_prescription_payable'),
                'report_fees'                        => request('doctor_report_fees'),
                'report_payable'                     => request('doctor_report_payable'),
                'salary_or_contract_fees'            => request('doctor_salary_or_contract_fees'),
                'test_commission'                    => request('doctor_test_commission'),
                'name'                               => ucwords(request('doctor_name')),
                'email'                              => request('doctor_email'),
                'mobile'                             => request('doctor_mobile'),
                'dob'                                => request('doctor_dob'),
                'gender'                             => request('doctor_gender'),
                'department_id'                      => request('doctor_department'),
                'chamber_id'                         => request('doctor_chamber'),
                'mailing_address'                    => request('doctor_mailing_address'),
                'permanent_address'                  => request('doctor_permanent_address'),
                'degrees'                            => ucwords(request('doctor_degrees')),
                'present_institute'                  => request('doctor_present_institute'),
                'institute_designation'              => request('doctor_institute_designation'),
                'institute_address'                  => request('doctor_institute_address'),
                'joining_date'                       => request('doctor_joining_date'),
                'status'                             => request('doctor_status'),
                'leave_or_present_status'            => request('doctor_leave_or_present_status'),
                'leave_or_present_note'              => request('doctor_leave_or_present_note'),
                'user_id'                            => Auth::user()->id
            );
        }

        Doctor::create($data);  

        return response()->json(['success' => 'New Doctor Added successfully.']);
    }

    public function store_doctor(Request $request){

        $validatedData = $request->validate([
            'doctor_type'                   =>  'required|numeric',
        ]);

        //doctor type 
        $doctor_type = $validatedData['doctor_type'];
        //doctor unique id generate
        $doctor_id =  'D-'.time();
        //doctor image
        if($request->hasFile('doctor_photo')){
            $this->validate($request, [
                'doctor_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2024'
            ]);

            $file = $request->file('doctor_photo');
            $imageName = 'doctor_'.time().'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->resize(165,155);
            $img->save(public_path('uploads/doctors/').$imageName);
        }
        else{
            $imageName ="";
        }
        //ind0or doctor
        if($doctor_type==1){
            $validatedData = $request->validate([
                'doctor_prescription_fees'                  =>  'required|numeric',
                'doctor_report_fees'                        =>  'required|numeric',
                'doctor_salary_or_contract_fees'            =>  'required|numeric',
                'doctor_test_commission'                    =>  'required|bool',
                'doctor_name'                               =>  'required|string|max:100',
                'doctor_degrees'                            =>  'required|string|max:100',
                'doctor_mobile'                             =>  'required',
                'doctor_dob'                                =>  'required',
                'doctor_gender'                             =>  'required|bool',
                'doctor_department'                         =>  'required',
                'doctor_chamber'                            =>  'required',
                'doctor_mailing_address'                    =>  'required|string|max:150',
                'doctor_permanent_address'                  =>  'required|string|max:150',
                'doctor_present_institute'                  =>  'required|string|max:150',
                'doctor_institute_designation'              =>  'required|string|max:100',
                'doctor_institute_address'                  =>  'required|string|max:150',
                'doctor_joining_date'                       =>  'required',
                'doctor_status'                             =>  'required|bool',
                'doctor_leave_or_present_status'            =>  'required|bool',
                'doctor_leave_or_present_note'              =>  'required|string|max:100',
            ]);

            $data = array(
                'doctor_id'                          => $doctor_id,
                'type'                               => $doctor_type,
                'prescription_fees'                  => $validatedData['doctor_prescription_fees'],
                'report_fees'                        => $validatedData['doctor_report_fees'],
                'salary_or_contract_fees'            => $validatedData['doctor_salary_or_contract_fees'],
                'test_commission'                    => $validatedData['doctor_test_commission'],
                'photo'                              => $imageName,
                'name'                               => ucwords($validatedData['doctor_name']),
                'email'                              => request('doctor_email'),
                'mobile'                             => $validatedData['doctor_mobile'],
                'dob'                                => $validatedData['doctor_dob'],
                'gender'                             => $validatedData['doctor_gender'],
                'department_id'                      => $validatedData['doctor_department'],
                'chamber_id'                         => $validatedData['doctor_chamber'],
                'mailing_address'                    => $validatedData['doctor_mailing_address'],
                'permanent_address'                  => $validatedData['doctor_permanent_address'],
                'degrees'                            => ucwords($validatedData['doctor_degrees']),
                'present_institute'                  => $validatedData['doctor_present_institute'],
                'institute_designation'              => $validatedData['doctor_institute_designation'],
                'institute_address'                  => $validatedData['doctor_institute_address'],
                'joining_date'                       => $validatedData['doctor_joining_date'],
                'status'                             => $validatedData['doctor_status'],
                'leave_or_present_status'            => $validatedData['doctor_leave_or_present_status'],
                'leave_or_present_note'              => $validatedData['doctor_leave_or_present_note'],
                'user_id'                            => Auth::user()->id
            );

            Doctor::create($data);
        }
        if($doctor_type==2){
            $validatedData = $request->validate([
                'doctor_prescription_fees'                  =>  'required|numeric',
                'doctor_prescription_payable'               =>  'required|numeric',
                'doctor_report_fees'                        =>  'required|numeric',
                'doctor_report_payable'                     =>  'required|numeric',
                'doctor_test_commission'                    =>  'required|bool',
                'doctor_name'                               =>  'required|string|max:100',
                'doctor_degrees'                            =>  'required|string|max:100',
                'doctor_mobile'                             =>  'required',
                'doctor_dob'                                =>  'required',
                'doctor_gender'                             =>  'required|bool',
                'doctor_department'                         =>  'required',
                'doctor_chamber'                            =>  'required',
                'doctor_mailing_address'                    =>  'required|string|max:150',
                'doctor_permanent_address'                  =>  'required|string|max:150',
                'doctor_present_institute'                  =>  'required|string|max:150',
                'doctor_institute_designation'              =>  'required|string|max:100',
                'doctor_institute_address'                  =>  'required|string|max:150',
                'doctor_status'                             =>  'required|bool',
                'doctor_joining_date'                       =>  'required',
                'doctor_leave_or_present_status'            =>  'required|bool',
                'doctor_leave_or_present_note'              =>  'required|string|max:100',
            ]);

            $data = array(
                'doctor_id'                          => $doctor_id,
                'type'                               => $doctor_type,
                'prescription_fees'                  => $validatedData['doctor_prescription_fees'],
                'prescription_fees'                  => $validatedData['doctor_prescription_fees'],
                'report_fees'                        => $validatedData['doctor_report_fees'],
                'report_payable'                     => $validatedData['doctor_report_payable'],
                'test_commission'                    => $validatedData['doctor_test_commission'],
                'photo'                              => $imageName,
                'name'                               => ucwords($validatedData['doctor_name']),
                'email'                              => request('doctor_email'),
                'mobile'                             => $validatedData['doctor_mobile'],
                'dob'                                => $validatedData['doctor_dob'],
                'gender'                             => $validatedData['doctor_gender'],
                'department_id'                      => $validatedData['doctor_department'],
                'chamber_id'                         => $validatedData['doctor_chamber'],
                'mailing_address'                    => $validatedData['doctor_mailing_address'],
                'permanent_address'                  => $validatedData['doctor_permanent_address'],
                'degrees'                            => ucwords($validatedData['doctor_degrees']),
                'present_institute'                  => $validatedData['doctor_present_institute'],
                'institute_designation'              => $validatedData['doctor_institute_designation'],
                'institute_address'                  => $validatedData['doctor_institute_address'],
                'joining_date'                       => $validatedData['doctor_joining_date'],
                'status'                             => $validatedData['doctor_status'],
                'leave_or_present_status'            => $validatedData['doctor_leave_or_present_status'],
                'leave_or_present_note'              => $validatedData['doctor_leave_or_present_note'],
                'user_id'                            => Auth::user()->id
            );

            Doctor::create($data);
        }
        if($doctor_type==3){
            $validatedData = $request->validate([
                'doctor_prescription_fees'                  =>  'required|numeric',
                'doctor_report_fees'                        =>  'required|numeric',
                'doctor_salary_or_contract_fees'            =>  'required|numeric',
                'doctor_test_commission'                    =>  'required|bool',
                'doctor_name'                               =>  'required|string|max:100',
                'doctor_degrees'                            =>  'required|string|max:100',
                'doctor_mobile'                             =>  'required',
                'doctor_dob'                                =>  'required',
                'doctor_gender'                             =>  'required|bool',
                'doctor_department'                         =>  'required',
                'doctor_chamber'                            =>  'required',
                'doctor_mailing_address'                    =>  'required|string|max:150',
                'doctor_permanent_address'                  =>  'required|string|max:150',
                'doctor_present_institute'                  =>  'required|string|max:150',
                'doctor_institute_designation'              =>  'required|string|max:100',
                'doctor_institute_address'                  =>  'required|string|max:150',
                'doctor_status'                             =>  'required|bool',
                'doctor_joining_date'                       =>  'required',
                'doctor_leave_or_present_status'            =>  'required|bool',
                'doctor_leave_or_present_note'              =>  'required|string|max:100',
            ]);

            $data = array(
                'doctor_id'                          => $doctor_id,
                'type'                               => $doctor_type,
                'prescription_fees'                  => $validatedData['doctor_prescription_fees'],
                'report_fees'                        => $validatedData['doctor_report_fees'],
                'salary_or_contract_fees'            => $validatedData['doctor_salary_or_contract_fees'],
                'test_commission'                    => $validatedData['doctor_test_commission'],
                'photo'                              => $imageName,
                'name'                               => ucwords($validatedData['doctor_name']),
                'email'                              =>  request('doctor_email'),
                'mobile'                             => $validatedData['doctor_mobile'],
                'dob'                                => $validatedData['doctor_dob'],
                'gender'                             => $validatedData['doctor_gender'],
                'department_id'                      => $validatedData['doctor_department'],
                'chamber_id'                         => $validatedData['doctor_chamber'],
                'mailing_address'                    => $validatedData['doctor_mailing_address'],
                'permanent_address'                  => $validatedData['doctor_permanent_address'],
                'degrees'                            => ucwords($validatedData['doctor_degrees']),
                'present_institute'                  => $validatedData['doctor_present_institute'],
                'institute_designation'              => $validatedData['doctor_institute_designation'],
                'institute_address'                  => $validatedData['doctor_institute_address'],
                'joining_date'                       => $validatedData['doctor_joining_date'],
                'status'                             => $validatedData['doctor_status'],
                'leave_or_present_status'            => $validatedData['doctor_leave_or_present_status'],
                'leave_or_present_note'              => $validatedData['doctor_leave_or_present_note'],
                'user_id'                            => Auth::user()->id
            );

            Doctor::create($data);
        }
        if($doctor_type==4){
            $validatedData = $request->validate([
                'doctor_test_commission'                    =>  'required|bool',
                'doctor_name'                               =>  'required|string|max:100',
                'doctor_degrees'                            =>  'required|string|max:100',
            ]);

            $data = array(
                'doctor_id'                          => $doctor_id,
                'type'                               => $doctor_type,
                'test_commission'                    => $validatedData['doctor_test_commission'],
                'photo'                              => $imageName,
                'name'                               => $validatedData['doctor_name'],
                'mobile'                             => request('doctor_mobile'),
                'degrees'                            => ucwords($validatedData['doctor_degrees']),
                'user_id'                            => Auth::user()->id
            );

            Doctor::create($data);
        }

        Session::flash('success','New Doctor Info. Added Successfully...');
        return redirect()->route('doctors.lists');
    }
    public function show($id){
        $doctor_chambers = room::where('type','2')->where('status',true)->get();
        $doctor_departments = DoctorDepartment::where('doctor_department_status',true)->get();
        $doctor = Doctor::findOrFail($id);

        return view ('admin.pages.doctors.doctor_view', compact('doctor','doctor_chambers','doctor_departments'));
        
        // if(request()->ajax())
        // {
        //     $result = Doctor::findOrFail($id);
        //     $user = $result->user;
        //     $department = $result->department;
        //     $chamber = $result->chamber;
            
        //     $data = [
        //         'result' => $result,
        //         'user' => $user,
        //         'chamber' => $chamber,
        //         'department' => $department,
        //     ];
           
        //     return response()->json($data);
        // }
    }

    public function edit(Request $request, $id){
        $doctor_chambers = room::where('type','2')->where('status',true)->get();
        $doctor_departments = DoctorDepartment::where('doctor_department_status',true)->get();
        $doctor = Doctor::findOrFail($id);
        return view ('admin.pages.doctors.doctor_edit', compact('doctor','doctor_chambers','doctor_departments'));
    }

    public function update(Request $request, $id){

        $doctor = Doctor::findOrFail($id);
        
        $rules = array(
            'doctor_type'               =>  'required|numeric',
            'doctor_name'               =>  'required|string',
            'doctor_degrees'            =>  'required|string',
            'doctor_test_commission'    =>  'required|bool',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if($request->hasFile('doctor_photo')){
            $this->validate($request, [
                'doctor_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2024'
            ]);
            $file = public_path('uploads/doctors/'.$doctor->photo);
            if (File::exists($file)) {
                File::delete($file);
            }
            $file = $request->file('doctor_photo');
            $fileName = 'doctor_'.time().'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->resize(165,155);
            $img->save(public_path('uploads/doctors/'.$fileName));
            $data = array(
                'doctor_id'                          => $doctor->doctor_id,
                'type'                               => request('doctor_type'),
                'prescription_fees'                  => request('doctor_prescription_fees'),
                'prescription_payable'               => request('doctor_prescription_payable'),
                'report_fees'                        => request('doctor_report_fees'),
                'report_payable'                     => request('doctor_report_payable'),
                'salary_or_contract_fees'            => request('doctor_salary_or_contract_fees'),
                'test_commission'                    => request('doctor_test_commission'),
                'name'                               => ucwords(request('doctor_name')),
                'email'                              => request('doctor_email'),
                'mobile'                             => request('doctor_mobile'),
                'photo'                              => $fileName,
                'dob'                                => request('doctor_dob'),
                'gender'                             => request('doctor_gender'),
                'department_id'                      => request('doctor_department'),
                'chamber_id'                         => request('doctor_chamber'),
                'mailing_address'                    => request('doctor_mailing_address'),
                'permanent_address'                  => request('doctor_permanent_address'),
                'degrees'                            => ucwords(request('doctor_degrees')),
                'present_institute'                  => request('doctor_present_institute'),
                'institute_designation'              => request('doctor_institute_designation'),
                'institute_address'                  => request('doctor_institute_address'),
                'joining_date'                       => request('doctor_joining_date'),
                'status'                             => request('doctor_status'),
                'leave_or_present_status'            => request('doctor_leave_or_present_status'),
                'leave_or_present_note'              => request('doctor_leave_or_present_note'),
                'user_id'                            => Auth::user()->id
            );
        }
        else{
            $data = array(
                'doctor_id'                          => $doctor->doctor_id,
                'type'                               => request('doctor_type'),
                'prescription_fees'                  => request('doctor_prescription_fees'),
                'prescription_payable'               => request('doctor_prescription_payable'),
                'report_fees'                        => request('doctor_report_fees'),
                'report_payable'                     => request('doctor_report_payable'),
                'salary_or_contract_fees'            => request('doctor_salary_or_contract_fees'),
                'test_commission'                    => request('doctor_test_commission'),
                'name'                               => ucwords(request('doctor_name')),
                'email'                              => request('doctor_email'),
                'photo'                              => request('old_photo'),
                'mobile'                             => request('doctor_mobile'),
                'dob'                                => request('doctor_dob'),
                'gender'                             => request('doctor_gender'),
                'department_id'                      => request('doctor_department'),
                'chamber_id'                         => request('doctor_chamber'),
                'mailing_address'                    => request('doctor_mailing_address'),
                'permanent_address'                  => request('doctor_permanent_address'),
                'degrees'                            => ucwords(request('doctor_degrees')),
                'present_institute'                  => request('doctor_present_institute'),
                'institute_designation'              => request('doctor_institute_designation'),
                'institute_address'                  => request('doctor_institute_address'),
                'joining_date'                       => request('doctor_joining_date'),
                'status'                             => request('doctor_status'),
                'leave_or_present_status'            => request('doctor_leave_or_present_status'),
                'leave_or_present_note'              => request('doctor_leave_or_present_note'),
                'user_id'                            => Auth::user()->id
            );
        }

        $doctor->update($data);  


        Session::flash('info','Doctor Info. Updated Successfully...');
        return redirect()->route('doctors.lists');

        // return response()->json(['success' => 'Doctor Info. Updated Successfully.']);

    }

    // public function destroy($id){
    //     $doctor = Doctor::findOrFail($id);
    //     $file = public_path('uploads/doctors/'.$doctor->photo);
    //     if (File::exists($file)) {
    //         File::delete($file);
    //     }
    //     $doctor->delete();
    //     Session::flash('info','Doctor Info. Deleted Successfully...');
    //     return redirect()->route('doctors.lists');
    // }

    public function leave_present(Request $request, $id){
        if(request()->ajax())
        {
            $leavePresent = Doctor::findOrFail($id);
            return response()->json($leavePresent);
        }
    }

    public function update_leave_present(Request $request, $id){
        $leavePresent = Doctor::findOrFail($id);
       
        $rules = array(
            'doctor_leave_or_present_status'       =>  'required|bool'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'leave_or_present_note'         => request('doctor_leave_or_present_note'),
            'leave_or_present_status'       => request('doctor_leave_or_present_status'),
            'user_id'                       => Auth::user()->id
        );

        $leavePresent->update($form_data);  

        Session::flash('info','Doctor Leave or Present Updated successfully...');
        return redirect()->route('doctors.lists');
    }
}
