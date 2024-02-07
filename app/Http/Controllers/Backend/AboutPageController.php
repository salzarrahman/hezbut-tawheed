<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutPageController extends Controller
{

    public function index(){

        $aboutus = About::where('section','page_about')->get();
        return view('backend.page.aboutus' ,compact('aboutus'));
    }

    public function update(Request $request)
    {

        $about_id = $request->id;
        $data = About::find($about_id);

        if ($request->file('image')) {

        $img = $data->image;
        unlink($img);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/page/about/'.$name_gen);
        $save_url = 'upload/page/about/'.$name_gen;


        About::findOrFail($about_id)->update([
            'title'             => $request->title,
            'title_slug'        => strtolower(str_replace(' ','-',$request->title)),
            'summary'           => $request->summary,
            'image'             => $save_url,
            'section'           => 'page_about',
            'updated_at'        => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'About Updated with Image Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.aboutus')->with($notification);


        }else{
            About::findOrFail($about_id)->update([
                'title'             => $request->title,
                'title_slug'        => strtolower(str_replace(' ','-',$request->title)),
                'summary'           => $request->summary,
                'section'           => 'page_about',
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'About Updated without Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('admin.aboutus')->with($notification);

        }
    }

    public function upload(Request $request): JsonResponse
    {


        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalExtension();
            $fileName = hexdec(uniqid()).'.'.$originName;
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'.'.$extension;
            $request->file('upload')->move(public_path('upload/page/about'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/page/about/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

    }
}
