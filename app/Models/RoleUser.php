<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'user_id',
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
