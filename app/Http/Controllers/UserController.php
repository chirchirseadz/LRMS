<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index()
    {
        //
        $users = User::paginate(10);
        $pageData = [
            'title' => 'Users List',
            'users' => $users,
        ];
        return view('users.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User added successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // if (!Auth::user()->can('view users')) {
        //     return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        // }

        $user = User::find($id);
        $roles = $user->getRoleNames();
        $permissions = $user->getPermissionsViaRoles();
        $directPermissions = $user->getDirectPermissions();
        $pageData = [
            'title' => 'User details',
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
            'directPermissions' => $directPermissions,
        ];
        // dd($pageData);

        return view('users.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        if (!Auth::user()->can('edit users')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }
        $user = User::find($id);

        $roles = Role::all();
        $permissions = Permission::all();

        $userPermissions = $user->getDirectPermissions()->pluck('name')->toArray();
        
        $pageData = [
            'title' => 'Edit users',
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
            'userPermissions' => $userPermissions,
        ];
       

        return view('users.edit', $pageData);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       User::checkPermission('edit users');
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        $user = User::findOrFail($id);
        $user->syncRoles($request->roles);
    
        $permissions = $request->input('permissions', []);
    
        $currentPermissions = $user->getAllPermissions()->pluck('name')->toArray();
    
        $permissionsToRevoke = array_diff($currentPermissions, $permissions);

        // dd($permissionsToRevoke);

    
        $user->revokePermissionTo($permissionsToRevoke);
        $user->givePermissionTo($permissions);
    
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();
        toastr()->success('Successfully updated a user');
    
        return redirect(route('user.edit', $user->id));
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('delete users')) {
            toastr()->error('OOPS ! No permissions');
            return redirect(route('user.index'));
        }
        $user->delete();
        toastr()->success('User deleted successfully');
    }
}
