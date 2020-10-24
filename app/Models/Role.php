<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
