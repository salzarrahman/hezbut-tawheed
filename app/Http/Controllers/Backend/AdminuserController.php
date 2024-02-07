<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alladminuser = User::where('role','admin')->latest()->get();
        return view('backend.admin.index',compact('alladminuser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

         $notification = array(
            'message' => 'New Admin User Created Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.adminuser')->with($notification);
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
    public function edit(string $id)
    {
        $adminuser = User::findOrFail($id);
        return view('backend.admin.edit',compact('adminuser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $admin_id = $request->id;

        $user = User::findOrFail($admin_id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

         $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.adminuser')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        User::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Admin User Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }

    public function inactive($id){

        User::findOrFail($id)->update(['status' => 'inactive']);

        $notification = array(
            'message' => 'Admin User Inactive',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }// End Mehtod


     public function active($id){

        User::findOrFail($id)->update(['status' => 'active']);

        $notification = array(
            'message' => 'Admin User Active',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }// End Mehtod
}
