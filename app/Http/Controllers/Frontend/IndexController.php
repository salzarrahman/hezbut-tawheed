<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blogpost;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{

    public function NewsDetails($id,$slug){

        $news = Blogpost::findOrFail($id);

        $tags = $news->tags;
        $tags_all = explode(',', $tags);

        $cat_id = $news->category_id;
        $relatedNews = Blogpost::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(6)->get();

        $newsKey = 'blog' . $news->id;
        if (!Session::has($newsKey)) {
           $news->increment('view_count');
           Session::put($newsKey,1);
        }

        $newnewspost = Blogpost::orderBy('id','DESC')->limit(8)->get();
        $newspopular = Blogpost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.page.postdetails',compact('news','tags_all','relatedNews','newnewspost','newspopular'));

    }// End Method




    public function CatWiseNews($id,$slug){

        $news = Blogpost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();

        $breadcat = Category::where('id',$id)->first();

        $newstwo = Blogpost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->limit(2)->get();

       $newnewspost = Blogpost::orderBy('id','DESC')->limit(8)->get();
        $newspopular = Blogpost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.category_news',compact('news','breadcat','newstwo','newnewspost','newspopular'));

    }// End Method


     public function SubCatWiseNews($id,$slug){

        $news = Blogpost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();

        $breadsubcat = SubCategory::where('id',$id)->first();

        $newstwo = Blogpost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->limit(2)->get();

        $newnewspost = Blogpost::orderBy('id','DESC')->limit(8)->get();
        $newspopular = Blogpost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.subcategory_news',compact('news','breadsubcat','newstwo','newnewspost','newspopular'));

    }// End Method

}
