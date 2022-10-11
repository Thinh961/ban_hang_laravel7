<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleStoreRequest;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;

class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'role']);

            return $next($request);
        });
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissions'));
    }

    public function store(RoleStoreRequest $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->back()->with('alert', 'Thêm vai trò thành công');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::where('parent_id', 0)->get();
        $permissionsChecked = $role->permissions;
        return view('admin.role.update', compact('permissions', 'role', 'permissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->back()->with('alert', 'Cập nhật vai trò thành công');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->back()->with('alert', 'Xoá vai trò thành công');
    }
}
