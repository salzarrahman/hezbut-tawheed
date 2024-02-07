<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        $id     = Auth::user()->id;
        $users  = User::find($id);

        return view('profile.users.index', compact('users'));
    }

    public function UserStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/users_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/users_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        return back()->with("status", "Profile Updated Successfully");

    }

    public function UserLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }// End Method


    public function UserChangepassword(){
        $id     = Auth::user()->id;
        $users   = User::find($id);

        return view('users.change_password',compact('users'));

    }// End Method


    public function UserUpdatePassword(Request $request){

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

    }// End Method

}

