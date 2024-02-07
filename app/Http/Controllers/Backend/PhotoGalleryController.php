<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Images;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        CoreComponentRepository::instantiateShopRepository();

        $sort_search =null;
        $query = null;
        $photo_gallery = Gallery::orderBy('created_at', 'desc');

        if ($request->category_id != null) {
            $category = $request->category_id;
            $photo_gallery = $photo_gallery->where('subcategory_id', $category);
        }

        if ($request->search != null){
            $sort_search = $request->search;
            $photo_gallery = $photo_gallery->where('title', 'like', '%'.$request->search.'%');

        }

        $photo_gallery = $photo_gallery->paginate(15);

        $categories = Category::where('category','Image Gallery')->get();
        $subcategories = SubCategory::where('category_id',$categories[0]['id'])->get();

        return view('backend.photogallery.index',compact('photo_gallery','sort_search','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('category','Image Gallery')->get();
        $subcategories = SubCategory::where('category_id',$categories[0]['id'])->get();

        return view('backend.photogallery.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/gallery/future/'.$name_gen);
        $save_url = 'upload/gallery/future/'.$name_gen;


        $gallery = Gallery::create([
            'title'          => $request->title,
            'title_slug'     => strtolower(str_replace(' ','-',$request->title)),
            'tags'           => $request->tags,
            'venue'          => $request->venue,
            'category_id'    => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'future_images'  => $save_url,
            'date'           => $request->date,
            'user_id'        => Auth::user()->id,
            'created_at'     => Carbon::now(),
        ]);

        $image = $request->file('multi_image');
        $captions = $request->input('captions');

        foreach($image as $key => $mulit_image){
            $name_gen = hexdec(uniqid()).'.'.$mulit_image->getClientOriginalExtension();
            Image::make($mulit_image)->save('upload/gallery/images/'.$name_gen);
            $mulit_image    = 'upload/gallery/images/'.$name_gen;
            Images::insert([
                'gallery_id'    => $gallery->id,
                'captions'      => $captions[$key],
                'images'        => $mulit_image,
                'created_at'    => Carbon::now(),
            ]);
        } // End Foreach

        $notification = array(
            'message' => 'Photo Gallery Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.photo_gallery')->with($notification);
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
        $photo_gallery = Gallery::findOrFail($id);
        $categories = Category::latest()->get();
        return view('backend.photogallery.edit',compact('photo_gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    {
        $photo_id = $request->id;
        $data = Gallery::find($photo_id);

        if($request->file('future_images')) {

            $img = $data->future_images;
            unlink($img);

            $image = $request->file('future_images');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/gallery/future/'.$name_gen);
            $save_url = 'upload/gallery/future/'.$name_gen;

            Gallery::findOrFail($photo_id)->update([
                'title'         => $request->title,
                'venue'         => $request->venue,
                'category_id'   => $request->category_id,
                'future_images' => $save_url,
                'date'          => $request->date,
            ]);

            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'success'

            );

            return redirect()->route('admin.photo_gallery')->with($notification);

        }elseif($request->file('multi_image')) {

            $post = Gallery::findOrFail($photo_id);

            if ($request->hasFile('multi_image')) {

                // Upload new images
                $images = $request->file('multi_image');
                foreach ($images as $image) {
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->save('upload/gallery/images'.$name_gen);
                    $mulit_image    = 'upload/gallery/images'.$name_gen;
                    $post->imagess()->create(['images' => $mulit_image]);
                }
            }


            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'success'

            );


            return redirect()->route('admin.photo_gallery')->with($notification);

        }else{

            Gallery::findOrFail($photo_id)->update([
                'title'         => $request->title,
                'venue'         => $request->venue,
                'category_id'   => $request->category_id,
                'date'          => $request->date,
            ]);

            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'success'

            );

            return redirect()->route('admin.photo_gallery')->with($notification);
        }


        // End If
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $photo_gallery = Gallery::findOrFail($id);

        $img    = $photo_gallery->future_images;

        if (!File::exists($img))
        {
            Gallery::findOrFail($id)->delete();
            $photo_gallery->imagess()->delete();

            $notification = array(
                'message' => 'Photo Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{

            unlink($img );

            foreach($photo_gallery->imagess as $item){
                unlink($item->images);
            }

            Gallery::findOrFail($id)->delete();
            $photo_gallery->imagess()->delete();

            $notification = array(
                'message' => 'Photo Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }



    }





 public function singelimageupdate(Request $request )
    {
        $photo_id = $request->id;
        $data = Images::find($photo_id);

        if($request->file('multi_image')) {

            $img = $data->images;
            unlink($img);
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/gallery/images/'.$name_gen);
            $save_url = 'upload/gallery/images/'.$name_gen;

            Images::findOrFail($photo_id)->update([
                'captions'     => $request->captions,
                'images'       => $save_url,
            ]);

            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{

            Images::findOrFail($photo_id)->update([
                'captions'     => $request->captions,
            ]);

            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'success'

            );

            return redirect()->back()->with($notification);
        }






        // End If
    }
    public function singelimagedestroy( $id)
    {
        $singelimage = Images::findOrFail($id);

        $img    = $singelimage->images;
        unlink($img );

        Images::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
