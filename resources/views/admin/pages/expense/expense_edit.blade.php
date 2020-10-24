@extends('layouts.master')
@section('title','Add Expense')
@section('expenses','active')
@section('expense_edit','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row clearfix mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Expense</h4>
                        <a type="button" href="{{ route('expense.list') }}" class="btn btn-primary text-white ml-auto float-right">
                            <i class="fas fa-list"></i>&nbsp;Expense List
                        </a>
                    </div>
                    <form id="add_form" action="{{ route("expense.update",$expense->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="expense_title">Expense Title <span class="text-danger">*</span></label>
                                    <input type="text" id="expense_title" name="expense_title" value="{{ old('expense_title',$expense->expense_title) }}" class="form-control" placeholder="-----" required="">
                                    <div class="invalid-feedback">
                                        Oh no! Expense Title ?
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="expense_amount">Expense Amount <span class="text-danger">*</span></label>
                                    <input type="number" id="expense_amount" name="expense_amount" value="{{ old('expense_amount',$expense->expense_amount) }}" min="0" class="form-control" placeholder="-----" required="">
                                    <div class="invalid-feedback">
                                        Oh no! Expense Amount?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a type="button" href="javascript:history.back()" class="btn btn-danger float-left text-white"><i class="fas fa-undo"></i> Back</a>
                        <button type="submit" class="btn btn-primary" id="update_button">Update Expense</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page_js')

@endsection