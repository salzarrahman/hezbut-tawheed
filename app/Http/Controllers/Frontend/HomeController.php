<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Visitor;
use App\Models\Countdown;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Stevebauman\Location\Facades\Location;



class HomeController extends Controller
{

    public function index(){

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Home'.' || '. $seo[0]['meta_title'];
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

        $slider = Slider::where('status',1)->orderBy('id', 'DESC')->take(2)->get();

        // $UserIP = $_SERVER['REMOTE_ADDR'];
        // $locationData = Location::get($UserIP);

        // $visitor = Visitor::where('ip_address', $UserIP)->first();
        // $date = Carbon::now()->toDateString();


        // if (!Visitor::where('ip_address', $UserIP)->where('date', $date)->exists()) {
        //     Visitor::insert([
        //         'date'          =>$date,
        //         'ip_address'    =>$UserIP,
        //         'device_name'   =>php_uname(),
        //         'location'      =>$locationData->latitude.'-'.$locationData->longitude,
        //         'country'       =>$locationData->countryName,
        //         'city'          =>$locationData->cityName,
        //         'created_at'    =>Carbon::now(),
        //     ]);
        // }



        return view('frontend.index',compact('slider'));
    }
}
