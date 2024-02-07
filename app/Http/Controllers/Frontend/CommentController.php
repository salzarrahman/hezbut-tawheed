<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->name){

            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'body'=>'required',
            ]);

            $input = $request->all();
            Comment::create($input);

            return back();

        }elseif($request->body_hidden) {

            $request->validate([
                'body_hidden'=>'required',
            ]);

            $input = $request->all();
            Comment::create($input);

            return back();

        }
        else{

            $request->validate([
                'body'=>'required',
            ]);

            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            Comment::create($input);

            return back();


        }



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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
