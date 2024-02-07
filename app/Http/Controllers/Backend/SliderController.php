<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::latest()->get();
        return view('backend.homepage.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.homepage.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(605, 790)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title'             => $request->title,
            'summary'           => $request->summary,
            'read_more_link'    => $request->read_more_link,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.slider')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);

        return view('backend.homepage.slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $slider_id = $request->id;
        $data = Slider::find($slider_id);

        if ($request->file('image')) {

            $img = $data->image;
            unlink($img);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(605, 790)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title'             => $request->title,
                'summary'           => $request->summary,
                'read_more_link'    => $request->read_more_link,
                'image'             => $save_url,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title'             => $request->title,
                'summary'           => $request->summary,
                'read_more_link'    => $request->read_more_link,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'News Post Updated without Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.slider')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $post_image = Slider::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function unpublish($id)
    {

        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider  Unpublish',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Mehtod


    public function publish($id)
    {

        if (Slider::where('status', 1)->count() === 1) {
            $notification = array(
                'message' => 'Cannot publish more than one. Already have a publish',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        } else {

            Slider::findOrFail($id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Slider Publish',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } // End Mehtod
}
