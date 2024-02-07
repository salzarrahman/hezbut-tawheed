<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ideology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IdeologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $ideology=  Ideology::latest()->get();
        return view('backend.page.ideology.index',compact('ideology'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.ideology.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             =>'required',
            'summary'           =>'required',
        ]);

        Ideology::insert([
            'title'         => $request->title,
            'title_slug'    =>strtolower(str_replace(' ', '', $request->title)),
            'summary'       => $request->summary,
        ]);

         $notification = array(
            'message' => 'Ideology Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.ideology')->with($notification);
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
        $ldeology = Ideology::findOrFail($id);
        return view('backend.page.ideology.edit',compact('ldeology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $ldeology_id = $request->id;
        $ldeology = Ideology::findOrFail($ldeology_id);
        $ldeology->title = $request->title;
        $ldeology->title_slug = strtolower(str_replace(' ', '-', $request->title));
        $ldeology->summary = $request->summary;
        $ldeology->save();
         $notification = array(
            'message' => 'Ideology Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.ideology')->with($notification);
    }


    public function unpublish($id){

        Ideology::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Blogpost User Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


     public function publish($id){
        Ideology::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Blogpost User Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


    public function destroy( $id)
    {
        Ideology::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Ideology Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
