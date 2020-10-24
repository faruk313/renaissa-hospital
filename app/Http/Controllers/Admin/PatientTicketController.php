<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.patient_tickets.patient_ticket_lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.patient_tickets.patient_ticket_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('patientTickets.ticketPrint');
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

    public function ticket_print()
    {
        return view('admin.pages.patient_tickets.ticket_print');
    }

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
    
}
