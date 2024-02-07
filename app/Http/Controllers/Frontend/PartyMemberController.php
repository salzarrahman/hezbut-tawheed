<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PartyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyMemberController extends Controller
{

    public function index(){


        $party_member   = PartyMember::where('status',1)->paginate(20);

        return view('frontend.page.partymember',compact('party_member'));
    }

    public function Details($slug_name){

        $party_member = PartyMember::where('slug_name',$slug_name)->get();
        return view('frontend.page.pmdetails',compact('party_member'));
    }

}
