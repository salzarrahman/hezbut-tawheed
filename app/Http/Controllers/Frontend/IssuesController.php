<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blogpost;
use App\Models\Category;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class IssuesController extends Controller
{


    public function index(){


        $category   = Category::where('category','issues')->pluck('id')->first();
        $issues     = Blogpost::where('status',1)->where('category_id', $category)->orderBy('id', 'DESC')->paginate(15);


        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Issues'.' || '. $seo[0]['meta_title'];
        $title_slug     = '';
        $description    = '';
        $keywords       = '';
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


        return view('frontend.page.issues',compact('issues'));
    }

    public function details($id, $slug){

        $issues          = Blogpost::findOrFail($id);
        $tags           = $issues->tags;
        $tagss          = explode(',', $tags);
        $cat_id         = $issues->category_id;
        $related_post   = Blogpost::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(6)->get();

        $categorys       = Category::latest()->get();
       // dd($tagss);

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = $seo[0]['meta_title'].' || '. $issues->news_title_slug;
        $title_slug     = $issues->news_title;
        $description    = $issues->news_details;
        $keywords       = $issues->tags;
        $lmage          = $path_link."/".$issues->image;

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

        return view('frontend.page.issuesdetails',compact('issues','categorys','related_post'));
    }


}
