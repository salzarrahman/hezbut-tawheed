<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Blogpost;
use App\Models\Category;
use App\Models\Postimages;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;


class BlogpostController extends Controller
{

    public function index(Request $request){

        CoreComponentRepository::instantiateShopRepository();

        $sort_search =null;
        $query = null;
        $blogposts = Blogpost::orderBy('id', 'desc');

        if ($request->category_id != null) {
            $category = $request->category_id;
            $blogposts = $blogposts->where('category_id', $category);
        }

        if ($request->has('search')){
            $sort_search = $request->search;
            $blogposts = $blogposts->where('news_title', 'like', '%'.$sort_search.'%');
        }

        $blogposts = $blogposts->paginate(15);

        return view('backend.blogpost.index',compact('blogposts','sort_search'));
    }

    public function create(){

        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $adminuser = User::where('role','admin')->latest()->get();

        return view('backend.blogpost.create',compact('categories','subcategories','adminuser'));
    }

    public function store(Request $request){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(784,436)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;


         Blogpost::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,
            'venue' => $request->venue,
            'date' => $request->date,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

         $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.blogpost')->with($notification);


    }// End Method


    public function edit($id){

        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $adminuser = User::where('role','admin')->latest()->get();
        $blogpost = Blogpost::findOrFail($id);

        return view('backend.blogpost.edit',compact('categories','subcategories','adminuser','blogpost'));

    } // End Method

    public function update(Request $request){

        $newspost_id = $request->id;
        $data = Blogpost::find($newspost_id);

        if ($request->file('image')) {

        $img = $data->image;
        unlink($img);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;


        Blogpost::findOrFail($newspost_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'venue' => $request->venue,
            'date' => $request->date,
            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Blogpost Updated with Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.blogpost')->with($notification);


        }else{

            Blogpost::findOrFail($newspost_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,
            'venue' => $request->venue,
            'date' => $request->date,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'updated_at' => Carbon::now(),

        ]);

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

         $notification = array(
            'message' => 'Blogpost Updated without Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.blogpost')->with($notification);

        }

    }// End Method


    public function destroy($id){

        $post_image = Blogpost::findOrFail($id);
        $img = $post_image->image;
        unlink($img);
        Blogpost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod


    public function unpublish($id){

        Blogpost::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Blogpost User Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


     public function publish($id){
        Blogpost::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Blogpost User Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod

    public function upload(Request $request): JsonResponse
    {

        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $request->file('upload')->move(public_path('upload/blog/post'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/blog/post/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

    }
}
