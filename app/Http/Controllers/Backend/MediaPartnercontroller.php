<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;

use App\Models\MediaPartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MediaPartnercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media_partner = MediaPartner::latest()->get();
        return view('backend.mediapartner.index', compact('media_partner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/mediapartner/' . $name_gen);
       // Image::make($image)->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->save('upload/mediapartner/crop/' . $name_gen);
        $save_url = 'upload/mediapartner/' . $name_gen;
        MediaPartner::insert([
            'title'      => $request->title,
            'link'       => $request->read_more_link,
            'image'      => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Media Partner Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.media_partner')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(MediaPartner $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $media_partner = MediaPartner::findOrFail($id);

        return view('backend.mediapartner.edit', compact('media_partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $slider_id = $request->id;
        $data = MediaPartner::find($slider_id);

        if ($request->file('image')) {

            $img = $data->image;
            unlink($img);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100, 80)->save('upload/mediapartner/' . $name_gen);
            $save_url = 'upload/mediapartner/' . $name_gen;



            MediaPartner::findOrFail($slider_id)->update([
                'title'             => $request->title,
                'link'              => $request->link,
                'image'             => $save_url,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Media Partner Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.media_partner')->with($notification);
        } else {
            MediaPartner::findOrFail($slider_id)->update([
                'title'         => $request->title,
                'link'          => $request->link,
                'updated_at'    => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Media Partner Updated without Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.media_partner')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media_partner = MediaPartner::findOrFail($id);
        $img = $media_partner->image;
        unlink($img);
        MediaPartner::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Media Partner Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function unpublish($id)
    {

        MediaPartner::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider  Unpublish',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Mehtod


    public function publish($id)
    {

        if (MediaPartner::where('status', 1)->count() === 1) {
            $notification = array(
                'message' => 'Cannot publish more than one. Already have a publish',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        } else {

            MediaPartner::findOrFail($id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Slider Publish',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } // End Mehtod
}
