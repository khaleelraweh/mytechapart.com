<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $permissions = Permission::pluck('name', 'name')->all();
        return view('backend.users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        if ($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }
        
        if ($request->has('permissions')) {
            $user->givePermissionTo($request->input('permissions'));
        }

        return redirect()->route('backend.users.index')
            ->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $permissions = Permission::pluck('name', 'name')->all();
        
        $userRole = $user->roles->pluck('name', 'name')->all();
        $userPermissions = $user->permissions->pluck('name', 'name')->all();

        return view('backend.users.edit', compact('user', 'roles', 'permissions', 'userRole', 'userPermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|same:confirm-password',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        
        $user->roles()->detach();
        if ($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }

        // Sync Direct Permissions
        $user->permissions()->detach();
        if ($request->has('permissions')) {
            $user->givePermissionTo($request->input('permissions'));
        }

        return redirect()->route('backend.users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('backend.users.index')
            ->with('success', 'User deleted successfully');
    }
}
