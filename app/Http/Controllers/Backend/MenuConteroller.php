<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Category;
use App\Models\ActiveMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class MenuConteroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activemenu     = ActiveMenu::latest()->get();
        $menus          = Menu::latest()->get();
        return view('backend.menu.index',compact('menus','activemenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Menu::insert([
            'menu_name' => $request->menu_name,
            'menu_slug' =>strtolower(str_replace(' ', '', $request->menu_name)),
            'status' => 'inactive',
        ]);

         $notification = array(
            'message' => 'Menu Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.menu')->with($notification);

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

    public function edit($id){

        $menu = Menu::findOrFail($id);
        return view('backend.menu.edit',compact('menu'));

    } // End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $menu_id = $request->id;
        $menu = Menu::findOrFail($menu_id);
        $menu->menu_name = $request->menu_name;
        $menu->menu_slug = strtolower(str_replace(' ', '-', $request->menu_name));
        $menu->save();
         $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.menu')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id){
        Menu::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Menu Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod


    public function inactive($id){

        Menu::findOrFail($id)->update(['status' => 'inactive']);

        $notification = array(
            'message' => 'Menu User Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


     public function active($id){
        Menu::findOrFail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'Menu User Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod

    public function activemenucreate()
    {
        $categories    = Category::pluck('category', 'id');

        return view('backend.menu.create',compact('categories'));
    }

    public function activemenuStore(Request $request){


        $activemenu = ActiveMenu::create([
            'title'         => $request->title,
        ]);
        $activemenu->category()->sync($request->input('category_id', []));


         $notification = array(
            'message' => 'ActiveMenu Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.menu')->with($notification);
    }

    public function ActiveMenuinactive($id){

        ActiveMenu::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'ActiveMenu User Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// End Mehtod


    public function ActiveMenuActive($id){

        ActiveMenu::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Menu User Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function activemenudestroy($id){

        ActiveMenu::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Active Menu Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod

    public function activemenuedit($id){

        $activemenu     = ActiveMenu::findOrFail($id);
        $categories    = Category::pluck('category', 'id');

        return view('backend.menu.edit',compact('activemenu','categories'));

    } // End Method

    /**
     * Update the specified resource in storage.
     */
    public function activemenuupdate(Request $request)
    {

        $activemenu_id = $request->id;
        $activemenu= ActiveMenu::findOrFail($activemenu_id);
        $activemenu->update([
            'title'         => $request->title,
            'updated_at'        => Carbon::now(),
        ]);
        $activemenu->category()->sync($request->input('category_id', []));

         $notification = array(
            'message' => 'Active Menu  Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.menu')->with($notification);
    }
}
