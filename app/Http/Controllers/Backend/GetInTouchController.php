<?php

namespace App\Http\Controllers\Backend;


use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class GetInTouchController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::where('status','Active')->get();
        return view('backend.subscribe.index', compact('subscribers'));
    }

    public function send_email()
    {
        return view('backend.subscribe.sendemail');
    }

    public function send_singel_email($id)
    {
        $subscriber_data = Subscriber::where('id',$id)->first();

       $email = $subscriber_data->email;

        return view('backend.subscribe.sendsingelemail',compact('email'));
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

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->message;

        $subscribers = Subscriber::where('status','Active')->get();

        foreach($subscribers as $row) {
            Mail::to($row->email)->send(new Websitemail($subject,$message));
        }

        $notification = array(
            'message' => 'Email is Sent Successfully.',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.subscriber')->with($notification);

    }
}
