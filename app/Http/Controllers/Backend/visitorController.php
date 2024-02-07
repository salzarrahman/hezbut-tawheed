<?php

namespace App\Http\Controllers\Backend;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class visitorController extends Controller
{
    public function index()
    {
        $visitor = Visitor::orderBy('id', 'DESC')->get();
        return view('backend.visitor.index', compact('visitor'));
    }


    public function details($id)
    {
        $visitor  = Visitor::findOrFail($id);
        return view('backend.visitor.details', compact('visitor'));
    }


    public function destroy($id){

        Visitor::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Visitor Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod
}
