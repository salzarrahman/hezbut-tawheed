<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Joining;
use App\Mail\Websitemail;
use App\Models\SeoSetting;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class JoiningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          =  'Joining'.' || '.$seo[0]['meta_title'];
        $title_slug     = '';
        $description    = '';
        $keywords       = '';
        $lmage          = '';

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

       return view('frontend.page.joining');
    }


    public function store(Request $request)
    {

        Joining::insert([
            'name'              => $request->name,
            'date_of_birth'     => $request->date_of_birth,
            'father_or_husband' => $request->father_or_husband,
            'mobile_no'         => $request->mobile_no,
            'present_address'   => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'occupation'        => $request->occupation,
            'education'         => $request->education,
            'experience'        => $request->experience,
            'find_movement'     => $request->find_movement,
            'person_name'       => $request->person_name,
            'person_mobile_no'  => $request->person_mobile_no,
        ]);

         $notification = array(
            'message' => 'Thank you! Your submission has been received!',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }


}
