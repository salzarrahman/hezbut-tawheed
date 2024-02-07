<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Joining;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class JoiningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $joining = Joining::latest()->get();
        return view('backend.joining.index',compact('joining'));
    }


    public function show($id)
    {
        $joining  = Joining::findOrFail($id);
        return view('backend.joining.show', compact('joining'));
    }

    public function sendemail($id)
    {
        $joining  = Joining::findOrFail($id);
        $email = $joining->email;

        return view('backend.joining.sendemail', compact('email'));
    }

    public function send_singel_email_submit(Request $request)
    {

        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->message;

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        $notification = array(
            'message' => 'Email is Sent Successfully.',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.subscriber')->with($notification);

    }

    public function destroy($id){
        Joining::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod

    public function read_at($id){

        $joining = Joining::find($id);
        Joining::findOrFail($joining->id)->update([
            'read_at'      => Carbon::now(),
        ]);

        return redirect()->route('admin.joining');
    }

}
