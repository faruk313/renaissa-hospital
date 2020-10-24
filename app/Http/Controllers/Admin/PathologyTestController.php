<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Room;
use App\Models\PathologyDepartment;
use App\Models\PathologyTest;
use Auth;

class PathologyTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = room::where('type','1')->where('status',true)->get();
        $departments = PathologyDepartment::where('pathology_department_status',true)->get();
        if($request->ajax())
        {
            $data = PathologyTest::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('test_status', function ($data) 
            {
                return $data->test_status == 1? '<span class="badge-outline col-green">Active</span>':'<span class="badge-outline col-red">Inactive</span>';
            })
            ->addColumn('actions', function($data){
                $button = '<a type="button" id="view" data-id="'.$data->id.'" class="view"><i class="far fa-eye text-success"></i></a>';
                $button .= '<a type="button" id="edit" data-id="'.$data->id.'" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>';
                $button .= '<a type="button" id="delete" data-id="'.$data->id.'" class="delete"><i class="far fa-trash-alt text-danger"></i></a>';
                return $button;
            })->rawColumns(['actions'])->escapeColumns([])->make(true);
        }
        return view ('admin.pages.pathology_tests.pathology_test_lists',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = room::where('type','1')->where('status',true)->get();
        return view ('admin.pages.pathology_tests.pathology_test_create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'test_code'             =>  'required|string|unique:pathology_tests,test_code|max:50',
            'test_name'             =>  'required|string|unique:pathology_tests,test_name|max:100',
            'test_price'            =>  'required|numeric',
            'patient_discount'      =>  'required|numeric',
            'doctor_discount'       =>  'required|numeric',
            'test_duration'         =>  'required|numeric',
            'test_room'             =>  'required|string',
            'test_status'           =>  'required|bool'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'test_code'             => request('test_code'),
            'test_name'             => ucwords(request('test_name')),
            'test_price'            => request('test_price'),
            'patient_discount'      => request('patient_discount'),
            'doctor_discount'       => request('doctor_discount'),
            'test_duration'         => request('test_duration'),
            'test_room'             => request('test_room'),
            'test_status'           => request('test_status'),
            'test_suggestion'       => request('test_suggestion'),
            'user_id'               => Auth::user()->id
        );

        PathologyTest::create($form_data);  

        return response()->json(['success' => 'New Pathology Test Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if(request()->ajax())
        {
            $rooms = room::where('type','1')->where('status',true)->get();
            $test = PathologyTest::findOrFail($id);

            $data = [
                'rooms' => $rooms,
                'test' => $test,
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if(request()->ajax())
        {
            $rooms = room::where('type','1')->where('status',true)->get();
            $test = PathologyTest::findOrFail($id);

            $data = [
                'rooms' => $rooms,
                'test' => $test,
            ];
            return response()->json($data);
        }
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
        $test = PathologyTest::findOrFail($id);

        $rules = array(
            'test_code'             =>  'required|string|max:50|unique:pathology_tests,test_code,'.$test->id,
            'test_name'             =>  'required|string|max:100|unique:pathology_tests,test_name,'.$test->id,
            'test_price'            =>  'required|numeric',
            'patient_discount'      =>  'required|numeric',
            'doctor_discount'       =>  'required|numeric',
            'test_duration'         =>  'required|numeric',
            'test_room'             =>  'required|string',
            'test_status'           =>  'required|bool'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'test_code'             => request('test_code'),
            'test_name'             => ucwords(request('test_name')),
            'test_price'            => request('test_price'),
            'patient_discount'      => request('patient_discount'),
            'doctor_discount'       => request('doctor_discount'),
            'test_duration'         => request('test_duration'),
            'test_room'             => request('test_room'),
            'test_status'           => request('test_status'),
            'test_suggestion'       => request('test_suggestion'),
            'user_id'               => Auth::user()->id
        );

        $test->update($form_data);  

        return response()->json(['success' => 'Pathology Test Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PathologyTest::findOrFail($id)->delete();
        return response()->json(['warning' => 'Pathology Test Deleted Successfully']);
    }
}
