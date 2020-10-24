<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Room;
use Auth;
use Validator;
use DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::latest()->get();
        // if($request->ajax())
        // {
        //     $data = Room::latest()->get();
        //     return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->editColumn('type', function ($data) 
        //     {
        //         if($data->type == 1){
        //             $type = '<span class="badge-outline col-blue">Pathology</span>';
        //         }
        //         if($data->type == 2){
        //             $type = '<span class="badge-outline col-purple">Doctor</span>';
        //         }
        //         return $type;
        //     })
        //     ->editColumn('status', function ($data) 
        //     {
        //         return $data->status == 1? '<span class="badge-outline col-green">Active</span>':'<span class="badge-outline col-red">Inactive</span>';
        //     })
        //     ->addColumn('actions', function($data){
        //         $button = '<a type="button" id="edit" data-id="'.$data->id.'" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>';
        //         return $button;
        //     })->rawColumns(['actions'])->escapeColumns([])->make(true);
           
        // }
        return view('admin.pages.rooms.rooms',compact('rooms'));
    }

    public function store(Request $request)
    {
        if(request('type')=='1'){
            $request->validate([
                'pathology_room_code'       =>  'required|string|unique:rooms,code|max:20',
                'pathology_room_status'     =>  'required|bool',
            ]);

            $form_data = array(
                'type'          => request('type'),
                'code'          => request('pathology_room_code'),
                'status'        => request('pathology_room_status'),
                'note'          => request('pathology_room_note'),
                'user_id'       => Auth::user()->id
            );
    
            Room::create($form_data);  

            Session::flash('success','New Pathology Room Added Successfully...');
            return redirect()->route('rooms');
        }
        elseif(request('type')=='2'){
            $request->validate([
                'doctor_chamber_code'       =>  'required|string|unique:rooms,code|max:20',
                'doctor_chamber_status'     =>  'required|bool',
            ]);

            $form_data = array(
                'type'     => request('type'),
                'code'          => request('doctor_chamber_code'),
                'status'        => request('doctor_chamber_status'),
                'note'          => request('doctor_chamber_note'),
                'user_id'       => Auth::user()->id
            );
    
            Room::create($form_data);  

            Session::flash('success','New Doctor Chamber Added Successfully..');
            return redirect()->route('rooms');
        }
       
        else{
            Session::flash('error','Invalid Request');
            return redirect()->route('rooms');
        }
    }

    public function show($id)
    {
        if(request()->ajax())
        {
            $data = Room::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        if(request()->ajax())
        {
            $data = Room::findOrFail($id);
            return response()->json(['result' => $data]);
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
        $room = Room::findOrFail($id);
        
        if($room->type=='1'){
            $rules = array(
                'pathology_room_code'       =>  'required|string|max:20|unique:rooms,code,'.$room->id,
                'pathology_room_status'     =>  'required|bool',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            $update_data = array(
                'type'     => $room->type,
                'code'          => request('pathology_room_code'),
                'status'        => request('pathology_room_status'),
                'note'          => request('pathology_room_note'),
                'user_id'       => Auth::user()->id
            );
    
            $room->update($update_data); 
            return response()->json(['success' => 'Pathology Room Updated Successfully.']);
        }
        elseif($room->type=='2'){
            $rules = array(
                'doctor_chamber_code'       =>  'required|string|max:20|unique:rooms,code,'.$room->id,
                'doctor_chamber_status'     =>  'required|bool',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            $update_data = array(
                'type'     => $room->type,
                'code'          => request('doctor_chamber_code'),
                'status'        => request('doctor_chamber_status'),
                'note'          => request('doctor_chamber_note'),
                'user_id'       => Auth::user()->id
            );
    
            $room->update($update_data);
            return response()->json(['success' => 'Doctor Chamber Updated Successfully.']);
        }
        else{
            return response()->json(['success' => 'No Request Found']);
        }
      
    }


    public function destroy($id)
    {
        $room= Room::findOrFail($id);
        $type = $room->type;
        if($type =='Pathology'){
            $room->delete();
            return response()->json(['success' => 'Pathology Room Deleted Successfully']);
        }

        elseif($type =='Doctor'){
            $room->delete();
            return response()->json(['success' => 'Doctor Chamber Deleted Successfully']);
        }
        
        else{
            return response()->json(['success' => 'Deleted Operation Failed']);
        }
    }
}
