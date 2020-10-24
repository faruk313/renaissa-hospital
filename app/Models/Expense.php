<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable=[
        'expense_title',
        'expense_amount',
        'expense_date',
        'user_id'
    ];
}
