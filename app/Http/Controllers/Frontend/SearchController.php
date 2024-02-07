<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $request->validate(['search' => "required"]);

        $item = $request->search;

        $search         = Blogpost::where('news_title','LIKE',"%$item%")->get();
        $searchpost     = Blogpost::orderBy('id','DESC')->limit(8)->get();
        $searchpopular  = Blogpost::orderBy('view_count','DESC')->limit(8)->get();
        $categorys      = Category::latest()->get();

        return view('frontend.page.search',compact('search','searchpost','searchpopular','categorys'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function SearchResults(Request $request)
    {
        $request->validate(['search' => "required"]);

        $item = $request->search;

        $search         = Blogpost::where('news_title','LIKE',"%$item%")->get();
        $searchpost     = Blogpost::orderBy('id','DESC')->limit(8)->get();
        $searchpopular  = Blogpost::orderBy('view_count','DESC')->limit(8)->get();
        $categorys      = Category::latest()->get();

        return view('frontend.page.searchresults',compact('search','searchpost','searchpopular','categorys'));
    }


}
