<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Abilitie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AbilitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $abilities = Abilitie::orderBy('id', 'DESC')->latest()->get();
        return view('backend.homepage.abilities.index',compact('abilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.homepage.abilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(170,202)->save('upload/abilities/'.$name_gen);
        $save_url = 'upload/abilities/' . $name_gen;
        Abilitie::insert([
            'category'    => $request->category,
            'title'      => $request->title,
            'summary'    => $request->summary,
            'link'       => $request->link,
            'image'      => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Abilitie Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.abilities')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $abilities = Abilitie::findOrFail($id);
        return view('backend.homepage.abilities.edit', compact('abilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $abilities_id = $request->id;
        $data = Abilitie::find($abilities_id);

        if ($request->file('image')) {

            $img = $data->image;
            unlink($img);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(170,202)->save('upload/abilities/'.$name_gen);
            $save_url = 'upload/abilities/' . $name_gen;
            Abilitie::findOrFail($abilities_id)->update([
                'category'    => $request->category,
                'title'      => $request->title,
                'summary'    => $request->summary,
                'link'       => $request->link,
                'image'      => $save_url,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Abilitie Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.abilities')->with($notification);
        } else {

            Abilitie::findOrFail($abilities_id)->update([
                'category'    => $request->category,
                'title'      => $request->title,
                'summary'    => $request->summary,
                'link'       => $request->link,
                'updated_at'    => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Abilitie Updated without Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.abilities')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abilities = Abilitie::findOrFail($id);
        $img = $abilities->image;
        unlink($img);
        Abilitie::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Abilitie Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function unpublish($id)
    {

        Abilitie::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider  Unpublish',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Mehtod


    public function publish($id)
    {

        if (Abilitie::where('status', 1)->count() === 6) {
            $notification = array(
                'message' => 'Cannot publish more than three. Already have a publish',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        } else {

            Abilitie::findOrFail($id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Slider Publish',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } // End Mehtod
}
