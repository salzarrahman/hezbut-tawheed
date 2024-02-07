<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->latest()->get();

        return view('backend.category.index',compact('categories'));
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
        Category::insert([
            'category' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

        ]);

         $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
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
    public function edit($id){

        $category = Category::findOrFail($id);
        return view('backend.category.edit',compact('category'));

    } // End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

        ]);

         $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.category')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id){
        Category::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod


    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('name','ASC')->get();
            return json_encode($subcat);

    }// End Mehtod
}
