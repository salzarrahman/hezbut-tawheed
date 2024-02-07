<?php

namespace App\Http\Controllers\Backend;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $book_category = BookCategory::orderBy('id', 'DESC')->latest()->get();

        return view('backend.book.category.index', compact('book_category'));
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
        BookCategory::insert([
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),

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
    public function edit($id)
    {
        $book_category = BookCategory::findOrFail($id);
        return view('backend.book.category.edit',compact('book_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cat_id = $request->id;

        BookCategory::findOrFail($cat_id)->update([
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),

        ]);

         $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.book_category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        BookCategory::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Category Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
