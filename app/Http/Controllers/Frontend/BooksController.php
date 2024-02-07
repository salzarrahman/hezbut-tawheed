<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SeoSetting;
use App\Models\BookCategory;
use App\Models\BookMangment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class BooksController extends Controller
{

    public function index(Request $request){

        $sort_search =null;
        $query = null;
        $books = BookMangment::orderBy('id', 'desc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $books = $books->where('title','LIKE',"%$sort_search%");
        }

        $books = $books->paginate(12);

        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          =  'Books'.' || '.$seo[0]['meta_title'];
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


        return view('frontend.page.books',compact('books'));
    }

    public function Details($id, $slug_name){

        $books          = BookMangment::findOrFail($id);
        $cat_id         = $books->category_id;
        $related_book   = BookMangment::where('categorie_id', $cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(10)->get();
        $categorys      = BookCategory::latest()->get();


        $seo            = SeoSetting::all();
        $current_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path_link      = "http://$_SERVER[HTTP_HOST]";
        $title          = $seo[0]['meta_title'].' || '. $books->title;
        $title_slug     = $books->title_slug;
        $description    = $books->description;
        $keywords       = $books->title_slug;
        $lmage          = asset($books->cover_image);
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


        return view('frontend.page.booksdetails',compact('books','related_book','categorys'));
    }
}
