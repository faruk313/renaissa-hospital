<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permission_user');
    }
}
