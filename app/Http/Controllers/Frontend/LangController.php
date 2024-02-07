<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;




class LangController extends Controller
{

    public function Change(Request $request){
        App::setLocale($request->lang);
        session()->put('locale',$request->lang);
        return redirect()->back();

    }// End Method
}
