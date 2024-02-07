<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->get();

        return view('backend.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::insert([
            'name'             => $request->name,
            'created_at'       => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Role Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.roles')->with($notification);
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
        $roles = Role::findOrFail($id);
        return view('backend.roles.edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        Role::findOrFail($id)->update([
            'name'             => $request->name,
            'updated_at'        => Carbon::now(),
         ]);

         $notification = array(
            'message' => 'Role Update Successfully',
            'alert-type' => 'success'
        );

         return redirect()->route('admin.roles')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Role Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
