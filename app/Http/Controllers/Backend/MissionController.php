<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $missions       = Mission::get();
        $missions_id    = Mission::find(1);

        return view('backend.homepage.mission.index',compact('missions','missions_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.homepage.mission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,svg',
        ]);


        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('upload/mission/'), $name_gen);
        $save_url = 'upload/mission/'.$name_gen;

        Mission::insert([
            'title'             => $request->feature_title,
            'summary'           => $request->summary,
            'link'              => $request->link,
            'image'             => $save_url,
            'created_at'        => Carbon::now(),
        ]);
         $notification = array(
            'message' => 'Mission Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.mission')->with($notification);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

     public function updateImg(Request $request)
     {


        Mission::findOrFail(1)->update([
        'title'             => $request->feature_title,
        'summary'           => $request->summary,
        'updated_at'        => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Mission Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }

    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
