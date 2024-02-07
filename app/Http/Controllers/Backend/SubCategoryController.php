<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::where('status',1)->get();
        $subcategory = SubCategory::orderBy('id', 'DESC')->latest()->get();

        return view('backend.category.subcategory',compact( 'categories','subcategory'));
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

        SubCategory::insert([
            'category_id' => $request->category_id,
            'name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);


         $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.subcategory')->with($notification);
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
        $categories = Category::latest()->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.editsub',compact('categories','subcategory'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $subcat_id = $request->id;

        Subcategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);


         $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.subcategory')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Sub Category  Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
