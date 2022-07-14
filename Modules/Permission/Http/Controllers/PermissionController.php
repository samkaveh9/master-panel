<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permission::index', [
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('permission::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PermissionRequest $request
     * @return Renderable
     */
    public function store(PermissionRequest $request)
    {
        Role::create($request->only('name'))->syncPermissions($request->permissions);
        flash()->title("successfully action")
            ->success('دسترسی با موفقیت اضافه شد')->flash();
         return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('permission::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Renderable
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        return view('permission::edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     * @param PermissionRequest $request
     * @param  $id
     * @return Renderable
     */
    public function update(PermissionRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions)->update($request->only('name'));
        flash()->title("successfully action")
            ->success('دسترسی با موفقیت ویرایش شد')->flash();
        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
//        $role = Role::findOrFail($id);
//        $role->delete();
        Role::where('id', $id)->delete();
        flash()->title("successfully action")
            ->success('دسترسی با موفقیت حذف شد')->flash();
        return back();
    }
}
