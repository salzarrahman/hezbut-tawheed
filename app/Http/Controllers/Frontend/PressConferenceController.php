<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressConferenceController extends Controller
{

    public function index()
    {
        return view('frontend.page.pressconference');
    }


    public function PcDetails($id, $slug)
    {
        $preconfdetails = Blogpost::findOrFail($id);
        $cat_id         = $preconfdetails->category_id;
        $related_post   = Blogpost::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(10)->get();

        return view('frontend.page.preconfdetails', compact('preconfdetails','related_post'));

    }


}
