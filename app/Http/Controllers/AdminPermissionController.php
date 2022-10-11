<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionStoreRequest;
use App\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'permission']);

            return $next($request);
        });
    }

    public function index()
    {
        $key_code = $this->getRouteAdmin();
        $permisions = Permission::all();
        $permisions = data_tree($permisions);
        return view('admin.permission.index', compact('permisions', 'key_code'));
    }

    public function create(PermissionStoreRequest $request)
    {
        $data = $request->all();
        $data['parent_id'] = $request->parent_id ? $request->parent_id : 0;
        Permission::create($data);
        return redirect()->back()->with('alert', 'Thêm quyền thành công');
    }

    public function update(PermissionStoreRequest $request, $id)
    {
        $data = $request->all();
        $data['parent_id'] = $request->parent_id ? $request->parent_id : 0;
        Permission::find($id)->update($data);
        return redirect()->route('admin.permission.index')->with('alert', 'Cập nhật quyền thành công');
    }

    public function edit($id)
    {
        $key_code = $this->getRouteAdmin();
        $permission = Permission::findOrFail($id);
        $permisions = Permission::all();
        $permisions = data_tree($permisions);
        return view('admin.permission.update', compact('permisions', 'key_code', 'permission'));
    }

    public function destroy($id)
    {
        $permisions = Permission::all();
        $permisions = data_tree($permisions, $id);
        $ids = array_map(function ($item) {
            return $item->id;
        }, $permisions);
        $ids[] = $id;
        Permission::whereIn('id', $ids)->delete();
        return redirect()->route('admin.permission.index')->with('alert', 'Xoá quyền thành công'); 
    }
}
