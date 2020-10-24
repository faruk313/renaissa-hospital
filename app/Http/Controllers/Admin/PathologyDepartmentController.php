<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PathologyDepartment;
use DataTables;
use Auth;
use Validator;


class PathologyDepartmentController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = PathologyDepartment::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('pathology_department_status', function ($data) 
            {
                return $data->pathology_department_status == 1? '<span class="badge-outline col-green">Active</span>':'<span class="badge-outline col-red">Inactive</span>';
            })
            ->editColumn('created_at', function ($data) 
            {
                return date('d-m-Y', strtotime($data->created_at) );
            })
            ->addColumn('actions', function($data){
                $button = '<a type="button" name="edit" id="'.$data->id.'" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>';
                $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete"><i class="far fa-trash-alt text-danger"></i></a>';
                return $button;
            })->rawColumns(['actions'])->escapeColumns([])->make(true);
        }
        return view('admin.pages.departments.pathology_departments');
    }
   
    public function store(Request $request)
    {
        if(empty(request('department_note'))){
            $rules = array(
                'pathology_department_name'        =>  'required|string|max:100|unique:Pathology_departments,pathology_department_name',
                'pathology_department_status'      =>  'required|bool'
            );
        }

        if(!empty(request('department_note'))){
            $rules = array(
                'pathology_department_name'        =>  'required|string|max:100|unique:Pathology_departments,pathology_department_name',
                'pathology_department_note'        =>  'required|string|max:255',
                'pathology_department_status'      =>  'required|bool'
            );
        }

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'pathology_department_name'         => request('pathology_department_name'),
            'pathology_department_note'         => request('pathology_department_note'),
            'pathology_department_status'       => request('pathology_department_status'),
            'user_id'                           => Auth::user()->id
        );  
        
        PathologyDepartment::create($form_data);  

        return response()->json(['success' => 'New Pathology Department Added Successfully...']);
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = PathologyDepartment::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }


    public function update(Request $request, $id)
    {
        $department = PathologyDepartment::findOrFail($id);
        if(empty(request('department_note'))){
            $rules = array(
                'pathology_department_name'        =>  'required|string|max:100|unique:Pathology_departments,pathology_department_name,'.$department->id,
                'pathology_department_status'      =>  'required|bool'
            );
        }

        if(!empty(request('department_note'))){
            $rules = array(
                'pathology_department_name'        =>  'required|string|max:100|unique:Pathology_departments,pathology_department_name,'.$department->id,
                'pathology_department_note'        =>  'required|string|max:255',
                'pathology_department_status'      =>  'required|bool'
            );
        }

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $update_data = array(
            'pathology_department_name'           => request('pathology_department_name'),
            'pathology_department_note'           => request('pathology_department_note'),
            'pathology_department_status'         => request('pathology_department_status'),
            'user_id'                   => Auth::user()->id
        );
        
        $department->update($update_data);  

        return response()->json(['success' => 'Pathology Department is Updated Successfully']);
    }


    public function destroy($id)
    {
        PathologyDepartment::findOrFail($id)->delete();

        return response()->json(['success' => 'Pathology Department Deleted Successfully...']);
    }
}
