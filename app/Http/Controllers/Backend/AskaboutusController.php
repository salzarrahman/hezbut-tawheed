<?php

namespace App\Http\Controllers\Backend;


use Carbon\Carbon;
use App\Mail\Websitemail;
use App\Models\Askaboutus;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class AskaboutusController extends Controller
{
    public function index()
    {
        $askaboutus = Askaboutus::latest()->get();
        return view('backend.askaboutus.index', compact('askaboutus'));
    }

    public function show($id)
    {
        $askaboutus  = Askaboutus::findOrFail($id);
        return view('backend.askaboutus.show', compact('askaboutus'));
    }

    public function sendemail($id)
    {
        $askaboutus  = Askaboutus::findOrFail($id);
        $email = $askaboutus->email;

        return view('backend.askaboutus.sendemail', compact('email'));
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

        Askaboutus::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod

    public function read_at($id){

        $askaboutus = Askaboutus::find($id);
        Askaboutus::findOrFail($askaboutus->id)->update([
            'read_at'      => Carbon::now(),
        ]);

        return redirect()->route('admin.ask-about-us');
    }
}
