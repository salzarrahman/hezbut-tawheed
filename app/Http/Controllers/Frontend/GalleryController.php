<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SeoSetting;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class GalleryController extends Controller
{
    public function index(){

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Gallery'.' || '. $seo[0]['meta_title'];
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


        $photo_gallery = Gallery::orderBy('id', 'DESC')->paginate(12);

       return view('frontend.page.gallery',compact('photo_gallery'));
    }


    public function galleryDetails ($id){

        $gallerydetails  = Gallery::findOrFail($id);

        $comments = $gallerydetails->imagess;

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Gallery'.' || '. $seo[0]['meta_title'];
        $title_slug     = $seo[0]['meta_author'];
        $description    = $gallerydetails->title;
        $keywords       = $seo[0]['meta_keyword'];
        $lmage          = asset($gallerydetails->future_images);

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

        return view('frontend.page.gallerydetails',compact('gallerydetails'));
    }

}
