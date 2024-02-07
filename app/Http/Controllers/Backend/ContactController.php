<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Contact;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){

        $contact = Contact::latest()->get();
        return view('backend.contact.index',compact('contact'));
    }

    public function show($id)
    {
        $contact  = Contact::findOrFail($id);

        return view('backend.contact.show', compact('contact'));
    }

    public function sendemail($id)
    {
        $contact  = Contact::findOrFail($id);
        $email = $contact->email;

        return view('backend.contact.sendemail', compact('email'));
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

        return redirect()->route('admin.contact')->with($notification);

    }

    public function destroy($id){

        Contact::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod


    public function read_at($id){

        $contact = Contact::find($id);

        Contact::findOrFail($contact->id)->update([
            'read_at'      => Carbon::now(),
        ]);

        return view('backend.contact.show', compact('contact'));
    }


}
