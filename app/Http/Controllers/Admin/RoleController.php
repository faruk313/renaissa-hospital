<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $roles = Role::paginate(10);
        return view('admin.pages.user_roles.role_lists', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function set_user_role()
    {
        return view('admin.pages.user_roles.set_user_role_create');
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
            'name' => 'required',
            'slug' => 'required',
        ]);

        $created_role = Role::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
        ]);

        return redirect()->route('role.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    /**
     * Set permission for role.
     *
     * @return mixed
     */
    public function setPermission(Request $request)
    {
        $role_id = $request->role_id;
        $permissions = $request->permission_id;

        $role_permission = $this->role->setPermission($role_id, $permissions);

        return redirect()->route('role.list')->with('success', 'Permission of Role is successfully added!');
    }

    /**
     * Update permission for role.
     *
     * @return mixed
     */
    public function editPermission($role_id, $role_name)
    {
        $data = [
            'role_id' => $role_id,
            'role_name' => $role_name,
            'role_permissions' => Role::find($role_id)->permissions,
            'permissions' => Permission::all(),
        ];

        return view('admin.pages.user_roles.edit_permission',$data);
    }

    /**
     * Update permission for role.
     *
     * @return mixed
     */
    public function updatePermission(Request $request)
    {
        $role_id = $request->role_id;
        $permissions = $request->permission_id;

        $role = Role::find($role_id);
        $role->permissions()->sync( $permissions);

        return redirect()->route('role.list')->with('success', 'Permission of Role is successfully added!');
    }
}
