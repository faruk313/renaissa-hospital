<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function list(){
        $users = User::paginate(10);
        return view('admin.pages.users.user_lists', compact('users'));
    }

    public function create(){
        return view('admin.pages.users.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $created_user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        return redirect()->route('user.role.edit', ['id'=>$created_user->id, 'name'=>$created_user->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editRole($user_id, $user_name)
    {
        $data = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'roles' => Role::all(),
            'user_roles' => User::find($user_id)->roles,
        ];

        return view('admin.pages.users.edit_role', $data);
    }

    /**
     * Update role for user.
     *
     * @return mixed
     */
    public function updateRole(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $roles = $request->role_id;
        $user->roles()->sync($roles);

        
        return redirect()->route('user.list')->with('success', 'Permission of User is successfully updated!');
    }
}
