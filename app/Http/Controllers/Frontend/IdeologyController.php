<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Ideology;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class IdeologyController extends Controller
{

    public function index()
    {
        $ideology   =  Ideology::latest()->paginate(20);

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Overview of Our Ideology'.' || '. $seo[0]['meta_title'];
        $title_slug     = 'Overview of Our Ideology'.' || '. $seo[0]['meta_title'];
        $description    = '';
        $keywords       = '';
        $lmage          = $path_link."/".$seo[0]['image'];


        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical($current_link);

        OpenGraph::addImage($lmage);
        OpenGraph::setTitle($title_slug);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($current_link);
        OpenGraph::setSiteName($title);

        TwitterCard::setTitle($title);
        TwitterCard::setSite($current_link);

        return view('frontend.page.ideology',compact('ideology'));
    }


}
