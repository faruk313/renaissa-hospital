<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=[
        'type',
        'code',
        'note',
        'status',
        'user_id'
    ];

    public function doctor(){
        return $this->hasMany('App\Models\Doctor');
    }
}
