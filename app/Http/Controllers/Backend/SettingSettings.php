<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;

class SettingSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::find(1);


        return view('backend.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bgimage()
    {

        $setting = Setting::find(1);

        return view('backend.setting.bgimage', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $setting_id = $request->id;
        $data = Setting::find($setting_id);

        if ($request->file('logo')) {
            $img = $data->logo;
            unlink($img);

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;

            Setting::findOrFail($setting_id)->update([
                'logo'            => $save_url,
                'updated_at'      => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Seo Setting Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }


        if ($request->file('breadcrumb_bg')) {
            $img = $data->breadcrumb_bg;
            unlink($img);
            $image = $request->file('breadcrumb_bg');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;
            Setting::findOrFail($setting_id)->update([
                'breadcrumb_bg'   => $save_url,
                'updated_at'      => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Breadcrumb background Image Change Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

        if ($request->file('footer_bg')) {
            $img = $data->footer_bg;
            unlink($img);
            $image = $request->file('footer_bg');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;
            Setting::findOrFail($setting_id)->update([
                'footer_bg'   => $save_url,
                'updated_at'      => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Footer background Image Change Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


        if ($request->file('campaign_bg')) {
            $img = $data->campaign_bg;
            unlink($img);
            $image = $request->file('campaign_bg');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;
            Setting::findOrFail($setting_id)->update([
                'campaign_bg'   => $save_url,
                'updated_at'      => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Campaign background Image Change Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


        if ($request->file('press_tweet_volunteer_left')) {
            $img = $data->press_tweet_volunteer_left;
            unlink($img);
            $image = $request->file('press_tweet_volunteer_left');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;
            Setting::findOrFail($setting_id)->update([
                'press_tweet_volunteer_left'   => $save_url,
                'updated_at'      => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Volunteer left background Image Change Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

        if ($request->file('press_tweet_volunteer_right')) {
            $img = $data->press_tweet_volunteer_right;
            unlink($img);
            $image = $request->file('press_tweet_volunteer_right');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;
            Setting::findOrFail($setting_id)->update([
                'press_tweet_volunteer_right'   => $save_url,
                'updated_at'                    => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Volunteer right background Image Change Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }




        if ($request->file('favicon')) {
            $img = $data->favicon;
            unlink($img);
            $image = $request->file('favicon');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/settings/' . $name_gen);
            $save_url = 'upload/settings/' . $name_gen;

            Setting::findOrFail($setting_id)->update([
                'favicon'            => $save_url,
                'updated_at'      => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Seo Setting Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }


        if ($request->site_title) {
            Setting::findOrFail($setting_id)->update([
                'site_title'     => $request->site_title,
                'tagline'        => $request->tagline,
                'address'        => $request->address,
                'email'          => $request->email,
                'web'            => $request->web,
                'phone_number'   => $request->phone_number,
                'col_01'         => $request->col_01,
                'phone_number_2' => $request->col_02,
                'col_03'         => $request->col_03,
                'col_04'         => $request->col_04,
                'col_05'         => $request->col_05,
                'col_06'         => $request->col_06,
                'col_07'         => $request->col_07,
                'col_08'         => $request->col_08,
                'updated_at'     => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Seo Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cacheClear()
    {
        return view('backend.setting.cacheclear');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        return back()->with('message','Cache cleared successfully');

    }
    public function routeCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        return back()->with('message','Route cleared successfully');
    }
    public function viewCache()
    {
        Artisan::call('view:clear');
        return back()->with('message','View cleared successfully');
    }
    public function optimizeClear()
    {
        Artisan::call('optimize:clear');
        return back()->with('message','View cleared successfully');
    }



}
