<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;
use Auth;

class ExpenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_count = '';
        $expenses = Expense::latest()->get();
        if($expenses->count()>0){
            $total = 0;
            foreach($expenses as $total_list){
                $total += $total_list->expense_amount;
            }

            $total_count = '<td></td>'.
            '<td>Total :</td>'.
            '<td>'.$total.'</td>'.
            '<td></td>'.
            '<td></td>';
        }

        return view('admin.pages.expense.expense_list',compact('expenses','total_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.expense.expense_create');
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
            'expense_title'                =>  'required|string|max:100',
            'expense_amount'               =>  'required|numeric',
        ]);

        $data = array(
            'expense_title'                 => $validatedData['expense_title'],
            'expense_amount'                => $validatedData['expense_amount'],
            'expense_date'                  => Carbon::now()->format('Y-m-d'),
            'user_id'                       => Auth::user()->id
        );

        Expense::create($data);

        Session::flash('success','Expense Added Successfully');
        return redirect()->route('expense.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $expense =Expense::findOrFail($id);
        // return view('admin.expense.expesne_show', comact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense =Expense::findOrFail($id);
        return view('admin.pages.expense.expense_edit', compact('expense'));
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
        $expense =Expense::findOrFail($id);

        $validatedData = $request->validate([
            'expense_title'                =>  'required|string|max:100',
            'expense_amount'               =>  'required|numeric',
        ]);

        $data = array(
            'expense_title'                 => $validatedData['expense_title'],
            'expense_amount'                => $validatedData['expense_amount'],
            'expense_date'                  => Carbon::now()->format('Y-m-d'),
            'user_id'                       => Auth::user()->id
        );

        $expense->update($data);
        Session::flash('updated','Expense Updated Successfully');
        return redirect()->route('expense.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = request('delete_id');
        $expense =Expense::findOrFail($id);
        $expense->delete();

        Session::flash('deleted','Expense Deleted');
        return redirect()->route('expense.list');
    }
}
