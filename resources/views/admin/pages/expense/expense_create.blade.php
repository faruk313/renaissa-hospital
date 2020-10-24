@extends('layouts.master')
@section('title','Add Expense')
@section('expenses','active')
@section('expense_create','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row clearfix mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Expense</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('expense.list') }}" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-list"></i>&nbsp;Expense List
                            </a>
                        </div>
                    </div>
                    <form id="add_form" action="{{ route("expense.store") }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="expense_title">Expense Title <span class="text-danger">*</span></label>
                                    <input type="text" id="expense_title" name="expense_title" value="{{ old('expense_title') }}" class="form-control" placeholder="-----" required="">
                                    <div class="invalid-feedback">
                                        Oh no! Expense Title ?
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="expense_amount">Expense Amount <span class="text-danger">*</span></label>
                                    <input type="number" id="expense_amount" name="expense_amount" value="{{ old('expense_amount') }}" min="0" class="form-control" placeholder="-----" required="">
                                    <div class="invalid-feedback">
                                        Oh no! Expense Amount?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a type="button" href="javascript:history.back()" class="btn btn-danger float-left text-white"><i class="fas fa-undo"></i> Back</a>
                        <button type="submit" class="btn btn-primary" id="add_button">Add Expense</button>
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