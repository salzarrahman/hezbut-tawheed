<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\BookMangment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;

class BookMangmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $sort_search   =null;
        $query         =null;
        $book_mangment =BookMangment::orderBy('id', 'desc');


        if ($request->categorie_id != null) {
            $category = $request->categorie_id;
            $book_mangment = $book_mangment->where('categorie_id', $category);
        }

        if ($request->has('search')){
            $sort_search = $request->search;
            $book_mangment = $book_mangment->where('title', 'like', '%'.$sort_search.'%');
        }

        $book_mangment = $book_mangment->paginate(15);

        return view('backend.book.ebook.index',compact('book_mangment','sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.book.ebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'             =>'required',
            'authors'           =>'required',
            'publisher_name'    =>'required',
            'publication_year'  =>'required',
            'country_origin'    =>'required',
            'description'       =>'required',
            'price'             =>'required',
            'categorie_id'      =>'required',
            'cover_image'       =>'required',
            'file'              => 'required|mimes:pdf',
        ]);

        $image = $request->file('cover_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/book/cover/'.$name_gen);
        $cover_image_link = 'upload/book/cover/'.$name_gen;

        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('upload/book/file'), $fileName);
        $file_link = 'upload/book/file/'.$fileName;

        BookMangment::insert([
            'title'            =>$request->title,
            'title_slug'       =>strtolower(str_replace(' ','-',$request->title)),
            'authors'          =>$request->authors,
            'publisher_name'   =>$request->publisher_name,
            'publication_year' =>$request->publication_year,
            'isbn_number'      =>$request->isbn_number,
            'book_edition'     =>$request->book_edition,
            'country_origin'   =>$request->country_origin,
            'description'      =>$request->description,
            'featured'         =>$request->featured,
            'top_slider'       =>$request->top_slider,
            'section'          =>$request->section,
            'private'          =>$request->private,
            'price'            =>$request->price,
            'categorie_id'     =>$request->categorie_id,
            'cover_image'      =>$cover_image_link,
            'pdf_file'         =>$file_link,
            'status'           =>1,
            'created_at'       => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'You have successfully upload file.',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.book_mangment')->with($notification);

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
    public function edit( $id)
    {
        $book_mangment = BookMangment::findOrFail($id);

        return view('backend.book.ebook.edit',compact('book_mangment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $book_mangment_id = $request->id;
        $data = BookMangment::find($book_mangment_id);

        if ($request->file('cover_image')) {
            $img = $data->cover_image;
            unlink($img);

            $image = $request->file('cover_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/book/cover/'.$name_gen);
            $cover_image_link = 'upload/book/cover/'.$name_gen;

            BookMangment::findOrFail($book_mangment_id)->update([
                'title'            =>$request->title,
                'title_slug'       =>strtolower(str_replace(' ','-',$request->title)),
                'authors'          =>$request->authors,
                'publisher_name'   =>$request->publisher_name,
                'publication_year' =>$request->publication_year,
                'isbn_number'      =>$request->isbn_number,
                'book_edition'     =>$request->book_edition,
                'country_origin'   =>$request->country_origin,
                'description'      =>$request->description,
                'featured'         =>$request->featured,
                'top_slider'       =>$request->top_slider,
                'section'          =>$request->section,
                'private'          =>$request->private,
                'price'            =>$request->price,
                'categorie_id'     =>$request->categorie_id,
                'cover_image'      =>$cover_image_link,
                'updated_at'       => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Updated with cover image Successfully',
                'alert-type' => 'success'

            );

            return redirect()->route('admin.book_mangment')->with($notification);

        }else{

            BookMangment::findOrFail($book_mangment_id)->update([
                'title'            =>$request->title,
                'title_slug'       =>strtolower(str_replace(' ','-',$request->title)),
                'authors'          =>$request->authors,
                'publisher_name'   =>$request->publisher_name,
                'publication_year' =>$request->publication_year,
                'isbn_number'      =>$request->isbn_number,
                'book_edition'     =>$request->book_edition,
                'country_origin'   =>$request->country_origin,
                'description'      =>$request->description,
                'featured'         =>$request->featured,
                'top_slider'       =>$request->top_slider,
                'section'          =>$request->section,
                'private'          =>$request->private,
                'price'            =>$request->price,
                'categorie_id'     =>$request->categorie_id,
                'updated_at'       => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Updated  Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.book_mangment')->with($notification);

        }

        if ($request->file('cover_image')) {
            $pdf_file = $data->pdf_file;
            unlink($pdf_file);

            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('upload/book/file'), $fileName);
            $file_link = 'upload/book/file/'.$fileName;

            BookMangment::findOrFail($book_mangment_id)->update([
                'title'            =>$request->title,
                'title_slug'       =>strtolower(str_replace(' ','-',$request->title)),
                'authors'          =>$request->authors,
                'publisher_name'   =>$request->publisher_name,
                'publication_year' =>$request->publication_year,
                'isbn_number'      =>$request->isbn_number,
                'book_edition'     =>$request->book_edition,
                'country_origin'   =>$request->country_origin,
                'description'      =>$request->description,
                'featured'         =>$request->featured,
                'top_slider'       =>$request->top_slider,
                'section'          =>$request->section,
                'private'          =>$request->private,
                'price'            =>$request->price,
                'categorie_id'     =>$request->categorie_id,
                'pdf_file'         =>$file_link,
                'updated_at'       => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Updated with file Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.book_mangment')->with($notification);

        }else{
            BookMangment::findOrFail($book_mangment_id)->update([
                'title'            =>$request->title,
                'title_slug'       =>strtolower(str_replace(' ','-',$request->title)),
                'authors'          =>$request->authors,
                'publisher_name'   =>$request->publisher_name,
                'publication_year' =>$request->publication_year,
                'isbn_number'      =>$request->isbn_number,
                'book_edition'     =>$request->book_edition,
                'country_origin'   =>$request->country_origin,
                'description'      =>$request->description,
                'featured'         =>$request->featured,
                'top_slider'       =>$request->top_slider,
                'section'          =>$request->section,
                'private'          =>$request->private,
                'price'            =>$request->price,
                'categorie_id'     =>$request->categorie_id,
                'updated_at'       => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Updated  Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.book_mangment')->with($notification);


        }



    }

    /**
     * Remove the specified resource from storage.
     */

     public function unpublish($id){

        BookMangment::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


     public function publish($id){
        BookMangment::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod

    public function destroy( $id)
    {
        $book_mangment = BookMangment::findOrFail($id);
        $cover_image = $book_mangment->cover_image;
        $pdf_file = $book_mangment->pdf_file;

        unlink($cover_image);
        unlink($pdf_file);

        BookMangment::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
