<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Models\Setting;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class ContactController extends Controller
{
    public function index(){

        $setting   = Setting::find(1);

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = 'Contact'.' || '. $seo[0]['meta_title'];
        $title_slug     = $seo[0]['meta_author'];
        $description    = $setting->address.' Email:'.$setting->email.' Phone number:'.$setting->phone_number;
        $keywords       = $seo[0]['meta_keyword'];
        $lmage          = $path_link."/".$seo[0]['image'];

        SEOMeta::setTitle($title );
        SEOMeta::setDescription( $description);
        SEOMeta::setKeywords($keywords);
        SEOMeta::setCanonical($current_link);

        OpenGraph::addImage($lmage);
        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($current_link);
        OpenGraph::setSiteName($title);

        TwitterCard::setTitle($title);
        TwitterCard::setSite($current_link);

        return view('frontend.page.contact',compact('setting'));
    }


    public function store(Request $request){


        $contact =  Contact::insert([
            'contact_to'    => 'Hezbut Tawheed',
            'name'          => $request->name,
            'email'         => $request->email,
            'mobile_no'     => $request->mobile_no,
            'mobile_no'     => $request->subject,
            'message'       => $request->message,
        ]);

        if ($contact == true) {
            return 1;

        }else {
            return 0;
        }





    }


    public function memberStore(Request $request){


        $members_contact = Contact::insert([
            'contact_to'    => $request->name,
            'name'          => $request->name,
            'email'         => $request->email,
            'mobile_no'     => $request->mobile_no,
            'subject'       => $request->subject,
            'message'       => $request->message,
        ]);

        if ($members_contact == true) {
                return 1;

        } else {

            return 0;
        }
         $notification = array(
            'message' => 'Thank you! Your submission has been received!',
            'alert-type' => 'success'
        );

        return back()->with($notification);


    }

}
