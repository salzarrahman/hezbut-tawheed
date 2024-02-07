<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class FeatureController extends Controller
{

    public function index()
    {
        $feature = Feature::all();

        return view('backend.homepage.feature.index',compact('feature'));
    }


    public function create()
    {
        return view('backend.homepage.feature.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,svg',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('upload/feature/'), $name_gen);
        $save_url = 'upload/feature/'.$name_gen;

        Feature::insert([
            'title'             => $request->feature_title,
            'summary'           => $request->summary,
            'link'              => $request->link,
            'image'             => $save_url,
            'created_at'        => Carbon::now(),
        ]);
         $notification = array(
            'message' => 'Feature Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.feature')->with($notification);
    }

    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        return view('backend.homepage.feature.edit',compact('feature'));
    }



    public function update(Request $request)
    {
        $featur_id = $request->id;
        $data = Feature::find($featur_id);




        if ($request->file('image')) {
            $img = $data->image;
            unlink($img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('upload/feature/'), $name_gen);
            $save_url = 'upload/feature/'.$name_gen;

            Feature::findOrFail($featur_id)->update([
                'title'             => $request->feature_title,
                'summary'           => $request->summary,
                'link'              => $request->link,
                'image'             => $save_url,
                'updated_at'        => Carbon::now(),
            ]);

             $notification = array(
                'message' => 'Feature Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.feature')->with($notification);

            }else{
                Feature::findOrFail($featur_id)->update([
                    'title'             => $request->feature_title,
                    'summary'           => $request->summary,
                    'link'              => $request->link,
                'updated_at'        => Carbon::now(),
            ]);

             $notification = array(
                'message' => 'Feature Updated without Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.feature')->with($notification);

            }
    }

    public function destroy($id)
    {

        $post_image = Feature::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        Feature::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function unpublish($id)
    {

        Feature::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider  Unpublish',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Mehtod


    public function publish($id)
    {

        if (Feature::where('status', 1)->count() === 3) {
            $notification = array(
                'message' => 'Cannot publish more than three. Already have a publish',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        } else {

            Feature::findOrFail($id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Slider Publish',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } // End Mehtod
}
