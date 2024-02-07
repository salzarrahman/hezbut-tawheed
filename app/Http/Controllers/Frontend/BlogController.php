<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blogpost;
use App\Models\Category;
use App\Models\SeoSetting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;


class BlogController extends Controller
{
    public function index(){

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Blog'.' || '. $seo[0]['meta_title'];
        $title_slug     = $seo[0]['meta_author'];
        $description    = $seo[0]['meta_description'];
        $keywords       = $seo[0]['meta_keyword'];
        $lmage          = $path_link."/".$seo[0]['image'];

        SEOMeta::setTitle($title );
        SEOMeta::setDescription( $description);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical($current_link);

        OpenGraph::addImage($lmage);
        OpenGraph::setTitle($title_slug);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($current_link);
        OpenGraph::setSiteName($title);

        TwitterCard::setTitle($title);
        TwitterCard::setSite($current_link);

        $blogpost   = Blogpost::where('status',1)->orderBy('id', 'DESC')->paginate(18);

        return view('frontend.page.blog',compact('blogpost'));

    }
    public function blogDetails ($id, $slug){

        $blogpost       = Blogpost::findOrFail($id);
        $tags           = $blogpost->tags;
        $tagss          = explode(',', $tags);
        $cat_id         = $blogpost->category_id;
        $related_post   = Blogpost::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(10)->get();
        $categorys       = Category::latest()->get();
      //  $recent_post     = Blogpost::where('status',1)->latest()->get();

        $newsKey = 'blog' . $blogpost->id;
        if (!Session::has($newsKey)) {
           $blogpost->increment('view_count');
           Session::put($newsKey,1);
        }

        $recent_post = Blogpost::where('status',1)->orderBy('id','DESC')->limit(8)->get();
        $newspopular = Blogpost::orderBy('view_count','DESC')->limit(8)->get();

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = $seo[0]['meta_title'].' || '. $blogpost->news_title_slug;
        $title_slug     = $blogpost->news_title;
        $description    = $blogpost->news_details;
        $keywords       = $blogpost->tags;
        $lmage          = $path_link."/".$blogpost->image;

        $descriptions = strip_tags($description);

        SEOMeta::setTitle($title );
        SEOMeta::setDescription( $descriptions);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical($current_link);

        OpenGraph::addImage($lmage);
        OpenGraph::setTitle($title_slug);
        OpenGraph::setDescription($descriptions);
        OpenGraph::setUrl($current_link);
        OpenGraph::setSiteName($title);

        TwitterCard::setTitle($title);
        TwitterCard::setSite($current_link);


        return view('frontend.page.singelpost',compact('newspopular','blogpost','tagss','related_post','categorys' ,'recent_post',));
    }

    public function blogCategory($id, $slug){

        $categorypost  = Blogpost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $breadcat = Category::where('id',$id)->first();
        return view('frontend.page.categorypost',compact('categorypost','breadcat'));
    }

    public function blogSubcategory($id, $slug){

        $subcategory  = Blogpost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $breadsubcat  = SubCategory::where('id',$id)->first();

        return view('frontend.page.subcategorypost',compact('subcategory','breadsubcat'));
    }

}
