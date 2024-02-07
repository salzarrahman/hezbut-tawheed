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

class CampaignController extends Controller
{
    public function index(){

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Campaign'.' || '. $seo[0]['meta_title'];
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

        $category   = Category::where('category','campaign')->pluck('id')->first();
        $campaign   = Blogpost::where('status',1)->where('category_id', $category)->orderBy('id', 'DESC')->paginate(1);

        return view('frontend.page.campaign',compact('campaign'));
    }

    public function details($id, $slug){

        $campaign       = Blogpost::findOrFail($id);
        $tags           = $campaign->tags;
        $tagss          = explode(',', $tags);
        $cat_id         = $campaign->category_id;
        $related_post   = Blogpost::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(6)->get();

       // dd($tagss);

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = $seo[0]['meta_title'].' || '. $campaign->news_title_slug;
        $title_slug     = $campaign->news_title;
        $description    = $campaign->news_details;
        $keywords       = $campaign->tags;
        $lmage          = $path_link."/".$campaign->image;

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

        return view('frontend.page.singelpost',compact('campaign','tagss','related_post'));
    }


}
