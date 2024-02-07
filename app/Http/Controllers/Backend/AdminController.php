<?php

namespace App\Http\Controllers\Backend;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index(){

        return view('backend.index');

    }// End Method


    public function AdminLogin(){
        return view('auth.admin.login');
    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => ' Logout Successfully',
            'alert-type' => 'info'

        );
        return redirect('/admin/login')->with($notification);
    }// End Method

    public function AdminLogoutPage(){
        return view('auth.admin.login');
    }// End Method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profile = User::find($id);

        return view('profile.admin.index', compact('profile'));
    }// End Method

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);

        if($request->username){
            $data->username = $request->username;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->save();

        }else{
            if ($request->file('photo')) {
                $file = $request->file('photo');
                @unlink(public_path('upload/admin_images/'.$data->photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'),$filename);
                $data['photo'] = $filename;
                $data->save();
            }
        }

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    public function AdminChangePassword(){
        return view('auth.admin.change_password');
    } // End Method

    public function AdminUpdatePassword(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with('error', "Old Password Doesn't Match!!");
        }

        // Update the new password
            User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', "Password Change Successfully");

    } // End Method



    public function AllAdmin(){

        $alladminuser = User::where('role','admin')->latest()->get();
        return view('backend.admin.index',compact('alladminuser'));
    } // End Method

    public function AddAdmin(){
        return view('backend.admin.create');
    } // End Method

    public function StoreAdmin(Request $request){

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
        return redirect()->route('admin.all.admin')->with($notification);

    } // End Method


    public function EditAdmin($id){

        $adminuser = User::findOrFail($id);
        return view('backend.admin.edit',compact('adminuser'));

    } // End Method

    public function UpdateAdmin(Request $request){

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
        return redirect()->route('admin.all.admin')->with($notification);

    } // End Method


    public function DeleteAdmin($id){

        User::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }// End Mehtod

    public function InactiveAdminUser($id){

        User::findOrFail($id)->update(['status' => 'inactive']);

        $notification = array(
            'message' => 'Admin User Inactive',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }// End Mehtod


     public function ActiveAdminUser($id){

        User::findOrFail($id)->update(['status' => 'active']);

        $notification = array(
            'message' => 'Admin User Active',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }// End Mehtod

}
