<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::orderBy('id', 'DESC')->get();


        return view('backend.permission.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allModels = $this->getAllModels();
        return view('backend.permission.create',compact('allModels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::insert([
            'name'             => $request->name,
            'group_name'       => $request->group_name,
            'created_at'       => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Permission Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.permission')->with($notification);
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
    public function edit( $id)
    {
        $permission = Permission::findOrFail($id);
        $allModels = $this->getAllModels();

        return view('backend.permission.edit',compact('permission','allModels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        Permission::findOrFail($id)->update([
            'name'             => $request->name,
            'group_name'       => $request->group_name,
            'updated_at'        => Carbon::now(),
         ]);

         $notification = array(
            'message' => 'Permission Update Successfully',
            'alert-type' => 'success'
        );

         return redirect()->route('admin.permission')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Permission Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }

    public function getAllModels()
    {
        $modelList = [];
        $path = app_path() . "/Models";
        $results = scandir($path);

        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $result;

            if (is_dir($filename)) {
                $modelList = array_merge($modelList, getModels($filename));
            }else{
                $modelList[] = substr($filename,0,-4);
            }
        }

        return $modelList;
    }
}
