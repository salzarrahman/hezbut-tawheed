<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SeoSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seo = SeoSetting::find(1);



        return view('backend.seo.index', compact('seo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {


        $seo_id = $request->id;
        $data = SeoSetting::find($seo_id);

        if ($request->file('image')) {
            $img = $data->image;
            unlink($img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1080)->save('upload/seo/' . $name_gen);
            $save_url = 'upload/seo/' . $name_gen;

            SeoSetting::findOrFail($seo_id)->update([
                'meta_title' => $request->meta_title,
                'meta_author' => $request->meta_author,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'image'             => $save_url,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Seo Setting Updated Successfully',
                'alert-type' => 'success'

            );

            return redirect()->back()->with($notification);
        } else {

            SeoSetting::findOrFail($seo_id)->update([
                'meta_title' => $request->meta_title,
                'meta_author' => $request->meta_author,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'updated_at'       => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Seo Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
