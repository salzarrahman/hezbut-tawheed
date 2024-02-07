<?php

namespace App\Http\Controllers\Frontend;


use App\Mail\Websitemail;
use App\Models\Askaboutus;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class AskaboutusController extends Controller
{

    public function store(Request $request){

        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'mobile_no' => 'required',
            'message'   => 'required',
        ]);

        $askaboutus = Askaboutus::insert([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile_no' => $request->mobile_no,
            'message'   => $request->message,
        ]);


       // Thank you very much for asking about us. I will contact you soon


       if ($askaboutus == true) {
            return 1;
        } else {

        return 0;

    }

        //  $notification = array(
        //     'message' => 'Thank you! Your submission has been received!',
        //     'alert-type' => 'success'
        // );

        // return back()->with($notification);

    }


}
