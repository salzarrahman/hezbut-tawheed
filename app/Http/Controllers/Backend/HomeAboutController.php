<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class HomeAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_about = About::where('section','home_about')->get();

        return view('backend.homepage.homeabout.index',compact('home_about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.homepage.homeabout.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('upload/homeabout/'), $name_gen);
        $save_url = 'upload/homeabout/'.$name_gen;

        About::insert([
            'title'             => $request->title,
            'title_slug'        => strtolower(str_replace(' ','-',$request->title)),
            'summary'           => $request->summary,
            'link'              => $request->link,
            'image'             => $save_url,
            'section'           => 'home_about',
            'created_at'        => Carbon::now(),
        ]);
         $notification = array(
            'message' => 'Home About Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.home-about')->with($notification);
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
        $home_about = About::findOrFail($id);

        return view('backend.homepage.homeabout.edit',compact('home_about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $about_id = $request->id;
        $data = About::find($about_id);

        if ($request->file('image')) {

        $img = $data->image;
        unlink($img);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(533,673)->save('upload/homeabout/'.$name_gen);
        $save_url = 'upload/homeabout/'.$name_gen;


        About::findOrFail($about_id)->update([
            'title'             => $request->title,
            'title_slug'        => strtolower(str_replace(' ','-',$request->title)),
            'summary'           => $request->summary,
            'link'              => $request->link,
            'image'             => $save_url,
            'section'           => 'home_about',
            'updated_at'        => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Home About Updated with Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.home-about')->with($notification);


        }else{
            About::findOrFail($about_id)->update([
                'title'             => $request->title,
                'title_slug'        => strtolower(str_replace(' ','-',$request->title)),
                'summary'           => $request->summary,
                'link'              => $request->link,
                'section'           => 'home_about',
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Home About Updated without Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.home-about')->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $home_about = About::findOrFail($id);
        $img = $home_about->image;
        unlink($img);

        About::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Home About Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
