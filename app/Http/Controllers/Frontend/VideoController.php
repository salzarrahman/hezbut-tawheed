<?php

namespace App\Http\Controllers\Frontend;

use GuzzleHttp\Client;
use App\Models\Youtube;
use App\Models\SeoSetting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;

class VideoController extends Controller
{
    public function index(Request $request, Client $httpClient)
    {

        CoreComponentRepository::instantiateShopRepository();

        $sort_search =null;
        $query = null;
        $youtubes = Youtube::orderBy('id', 'desc');

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Video' . ' - ' . $seo[0]['meta_title'];
        $title_slug     = $seo[0]['meta_author'];
        $description    = $seo[0]['meta_description'];
        $keywords       = $seo[0]['meta_keyword'];
        $lmage          = $path_link . "/" . $seo[0]['image'];

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

        if ($request->has('search')){
            $sort_search = $request->search;
            $youtubes = $youtubes->where('title','LIKE',"%$sort_search%");
        }

        $youtubes = $youtubes->paginate(30);

        return view('frontend.page.video', compact('youtubes'));
    }

    public function videoCategory ($id, $slug){

        $youtubes = Youtube::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC');
        $youtubes = $youtubes->paginate(30);

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          =  ucfirst($slug) . ' - ' . $seo[0]['meta_title'];
        $title_slug     = $slug;
        $description    = '';
        $keywords       = $seo[0]['meta_keyword'];
        $lmage          = '';

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


        return view('frontend.page.video',compact('youtubes'));
    }




}
