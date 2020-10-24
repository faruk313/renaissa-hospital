<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\DoctorDepartment;

use Auth;

class DoctorDepartmentController extends Controller
{

    public function index(Request $request)
    {
        $doctor_departments = DoctorDepartment::latest()->get();
        return view('admin.pages.departments.doctor_departments',compact('doctor_departments'));
    }
   
    public function store(Request $request)
    {
       
        $request->validate([
            'doctor_department_name'        =>  'required|string|max:100|unique:doctor_departments,department_name',
            'doctor_department_status'      =>  'required|bool'
        ]);
    

        $form_data = array(
            'department_name'               => request('doctor_department_name'),
            'department_note'               => request('doctor_department_note'),
            'department_status'             => request('doctor_department_status'),
            'user_id'                       => Auth::user()->id
        );
        
        DoctorDepartment::create($form_data);  

        Session::flash('success','New Doctor Department Added Successfully...');
        return redirect()->route('doctorDepartments');

    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = DoctorDepartment::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }


    public function update(Request $request, $id)
    {
        $department = DoctorDepartment::findOrFail($id);
        if(empty(request('department_note'))){
            $rules = array(
                'department_name'        =>  'required|string|max:100|unique:doctor_departments,doctor_department_name,'.$department->id,
                'department_status'      =>  'required|bool'
            );
        }    
           
        if(!empty(request('department_note'))){
            $rules = array(
                'department_name'        =>  'required|string|max:100|unique:doctor_departments,department_name,'.$department->id,
                'department_note'        =>  'required|string|max:255',
                'department_status'      =>  'required|bool'
            );
        }
       
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $update_data = array(
            'department_name'        => request('department_name'),
            'department_note'        => request('department_note'),
            'department_status'      => request('department_status'),
            'user_id'                       => Auth::user()->id
        );
        
        $department->update($update_data);  

        return response()->json(['success' => 'Doctor Department is Updated Successfully']);
    }


    public function destroy($id)
    {
        DoctorDepartment::findOrFail($id)->delete();

        return response()->json(['success' => 'Doctor Department Deleted Successfully...']);
    }
}
