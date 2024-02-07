<?php

namespace App\Http\Controllers\Backend;

use App\Models\Youtube;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;

class YoutubeController extends Controller
{

    public function index(Request $request){

        //$video =Youtube::orderBy('id', 'DESC')->get();

        CoreComponentRepository::instantiateShopRepository();

        $sort_search =null;
        $query = null;
        $video = Youtube::orderBy('created_at', 'desc');

        if ($request->category_id != null) {
            $category = $request->category_id;
            $video = $video->where('subcategory_id', $category);
        }

        if ($request->search != null){
            $sort_search = $request->search;
            $video = $video->where('title', 'like', '%'.$request->search.'%');

        }

        $video = $video->paginate(15);

        $categories = Category::where('category','Youtube Video')->get();
        $subcategories = SubCategory::where('category_id',$categories[0]['id'])->get();

        return view('backend.video.index',compact('video','subcategories'));
    }


    public function create(Request $request ){

        $result         = '';
        $channel_iamge  = "";

        $video_id = $request->input('video_id');

        if($video_id){
                $apikey           = env('YOUTUBE_API',null);
                $json             = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=' . $video_id . '&key=' . $apikey . '&part=snippet');
                $result           = json_decode($json, true);
                $channelId        = $result['items'][0]['snippet']['channelId'];
                $urls             = "https://www.googleapis.com/youtube/v3/channels?part=snippet&id=" . $channelId . "&key=" . $apikey;
                $channel_img      = file_get_contents($urls);
                $channel_iamge    = json_decode($channel_img, true);

            }

        $categories = Category::where('category','Youtube Video')->get();
        $subcategories = SubCategory::where('category_id',$categories[0]['id'])->get();


        return view('backend.video.create',compact('result','channel_iamge','categories','subcategories'));

    }

    public function store(Request $request){


        Youtube::insert([
            'category_id'    => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'tags'           => $request->tags,
            'channel_iamge'  => $request->channel_iamge,
            'channelId'      => $request->channelId,
            'video_id'       => $request->video_id,
            'video_link'     => $request->video_link,
            'title'          => $request->title,
            'description'    => $request->description,
            'thumbnails'     => $request->thumbnails,
            'channelTitle'   => $request->channelTitle,
            'publishedAt'    => $request->publishedAt,
            'status'         => 1,
            'user_id'        => Auth::user()->id,
            'title_slug'     => strtolower(str_replace(' ','-',$request->title)),
        ]);

         $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.video')->with($notification);


    }// End Mehtod

    public function edit($id){

        $categories     = Category::where('category','Youtube Video')->get();
        $subcategories  = SubCategory::where('category_id',$categories[0]['id'])->get();
        $videos        = Youtube::findOrFail($id);

        return view('backend.video.edit',compact('categories','subcategories','videos'));

    } // End Method

    public function update(Request $request){
        $video_id = $request->id;
        Youtube::findOrFail($video_id)->update([
            'category_id'    => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'tags'           => $request->tags,
            'channel_iamge'  => $request->channel_iamge,
            'channelId'      => $request->channelId,
            'video_id'       => $request->video_id,
            'video_link'     => $request->video_link,
            'title'          => $request->title,
            'description'    => $request->description,
            'thumbnails'     => $request->thumbnails,
            'channelTitle'   => $request->channelTitle,
            'publishedAt'    => $request->publishedAt,
            'status'         => 1,
            'user_id'        => Auth::user()->id,
            'title_slug'     => strtolower(str_replace(' ','-',$request->title)),
        ]);

        $notification = array(
            'message' => 'Video update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.video')->with($notification);


    }
    public function unpublish($id)
    {

        Youtube::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Video  Unpublish',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Mehtod


    public function publish($id)
    {
            Youtube::findOrFail($id)->update(['status' => 1]);
            $notification = array(
                'message' => 'Video Publish',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

    } // End Mehtod

    public function destroy($id){

        Youtube::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Youtube Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod

}
