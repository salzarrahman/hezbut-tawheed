<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles              = Role::all();
        return view('backend.rolepermission.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission         = Permission::all();
        $roles              = Role::all();
        $permissions_group  = User::getPermissionGroup();
        return view('backend.rolepermission.create',compact('permission','roles','permissions_group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $data = array();
        $permissions = $request->permission;


        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

         $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.role_permission')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission         = Permission::all();
        $role               = Role::findOrFail($id);
        $permissions_group  = User::getPermissionGroup();
        return view('backend.rolepermission.edit',compact('permission','role','permissions_group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
           $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Update Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.role_permission')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
