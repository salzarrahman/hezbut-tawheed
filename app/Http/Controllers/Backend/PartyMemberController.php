<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\PartyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PartyMemberController extends Controller
{

    public function index()
    {

        $party_member = PartyMember::get();
        return view('backend.page.partymember.index', compact('party_member'));
    }

    public function create()
    {
        return view('backend.page.partymember.create');
    }

    public function store(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(534, 573)->save('upload/member/' . $name_gen);
        $save_url = 'upload/member/' . $name_gen;

        PartyMember::insert([
            'name'           => $request->name,
            'slug_name'      => strtolower(str_replace(' ','-',$request->name)),
            'designation'    => $request->designation,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'about_me'       => $request->about_me,
            'how_to_join_ht' => $request->how_to_join_ht,
            'movement_life'  => $request->movement_life,
            'achievement'    => $request->achievement,
            'address'        => $request->address,
            'facebook'       => $request->facebook,
            'twitter'        => $request->twitter,
            'instagram'      => $request->instagram,
            'linkedin'       => $request->linkedin,
            'skype'          => $request->skype,
            'whatsapps'      => $request->whatsapps,
            'image'          => $save_url,
            'status'         => 1,
            'created_at'     => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Member Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.party_member')->with($notification);
    }

    public function edit($id)
    {

        $party_member = PartyMember::findOrFail($id);

        return view('backend.page.partymember.edit', compact('party_member'));
    }

    public function update(Request $request)
    {
        $party_member_id = $request->id;
        $data = PartyMember::find($party_member_id);

        if ($request->file('image')) {

            $img = $data->image;
            unlink($img);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(534, 573)->save('upload/member/' . $name_gen);
            $save_url = 'upload/member/' . $name_gen;

            PartyMember::findOrFail($party_member_id)->update([
                'name'           => $request->name,
                'slug_name'      => strtolower(str_replace(' ','-',$request->name)),
                'designation'    => $request->designation,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'about_me'       => $request->about_me,
                'how_to_join_ht' => $request->how_to_join_ht,
                'movement_life'  => $request->movement_life,
                'achievement'    => $request->achievement,
                'address'        => $request->address,
                'facebook'       => $request->facebook,
                'twitter'        => $request->twitter,
                'instagram'      => $request->instagram,
                'linkedin'       => $request->linkedin,
                'skype'          => $request->skype,
                'whatsapps'      => $request->whatsapps,
                'status'         => 1,
                'image'          => $save_url,
                'created_at'     => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Party member Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('admin.party_member')->with($notification);

        } else {

            PartyMember::findOrFail($party_member_id)->update([
                'name'           => $request->name,
                'slug_name'      => strtolower(str_replace(' ','-',$request->name)),
                'designation'    => $request->designation,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'about_me'       => $request->about_me,
                'how_to_join_ht' => $request->how_to_join_ht,
                'movement_life'  => $request->movement_life,
                'achievement'    => $request->achievement,
                'address'        => $request->address,
                'facebook'       => $request->facebook,
                'twitter'        => $request->twitter,
                'instagram'      => $request->instagram,
                'linkedin'       => $request->linkedin,
                'skype'          => $request->skype,
                'whatsapps'      => $request->whatsapps,
                'status'         => 1,
                'created_at'     => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Party member Updated without Image Successfully',
                'alert-type' => 'success'

            );

            return redirect()->route('admin.party_member')->with($notification);
        }
    }

    public function destroy($id)
    {
        $party_member = PartyMember::findOrFail($id);
        $img = $party_member->image;
        unlink($img);
        PartyMember::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function unpublish($id){

        PartyMember::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'PartyMember User Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


     public function publish($id){

        PartyMember::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'PartyMember User Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod
}
