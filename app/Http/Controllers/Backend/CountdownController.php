<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Countdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CountdownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countdowns = Countdown::find(1);
        return view('backend.homepage.countdown.index', compact('countdowns'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        $countdown_id = $request->id;
        Countdown::findOrFail($countdown_id)->update([
            'title_01'              => $request->title_01,
            'title_01_countdowns'   => $request->title_01_countdowns,
            'title_01_icon'         => $request->title_01_icon,
            'title_02'              => $request->title_02,
            'title_02_countdowns'   => $request->title_02_countdowns,
            'title_03_icon'         => $request->title_03_icon,
            'title_03'              => $request->title_03,
            'title_03_countdowns'   => $request->title_03_countdowns,
            'title_04_icon'         => $request->title_03_icon,
            'title_04'              => $request->title_04,
            'title_04_countdowns'   => $request->title_04_countdowns,
            'title_04_icon'         => $request->title_04_icon,
            'updated_at'       => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Countdown Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

}
