<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialmedia = SocialMedia::find(1);
        return view('backend.homepage.socialmedia.index',compact('socialmedia'));
    }


    public function update(Request $request)
    {
        $countdown_id = $request->id;
        SocialMedia::findOrFail($countdown_id)->update([
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin'  => $request->linkedin,
            'skype'     => $request->skype,
            'whatsapp'  => $request->whatsapp,
            'youtube'   => $request->youtube,
            'updated_at'=> Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Social Media Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
