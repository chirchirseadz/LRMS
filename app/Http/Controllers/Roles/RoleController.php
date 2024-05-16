<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role ;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        $pageData = [
            'roles' => $roles,
            'title' => 'ROLES PAGE'
        ];
        return view('roles.index', $pageData);
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        

        $pageData = [
            'role' => $role,
            'title' => 'PERMISSION VIEW PAGE',
            'permissions' => $permissions, 
        ];

        return view('roles.show', $pageData);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        $pageData = [
            'role' => $role,
            'permissions' => $permissions, 
            'title' => "EDIT ROLE'S PERMISSIONS"
        ];
        return view('roles.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $role = Role::findOrFail($id);
        $permissionsIds = $request->input('permissions', []);
        $permissions = Permission::whereIn('id', $permissionsIds)->get();
        $role->syncPermissions($permissions);

        return 'Successfully assigned roles with permissions';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}