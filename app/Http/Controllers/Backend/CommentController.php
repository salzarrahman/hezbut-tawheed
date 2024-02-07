<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index()
    {
        $comment = Comment::latest()->get();
        return view('backend.comment.index', compact('comment'));
    } // End Mehtod


    public function show($id)
    {
        $comment  = Comment::findOrFail($id);
        return view('backend.comment.show', compact('comment'));
    } // End Mehtod

    public function sendemail($id)
    {
        $comment  = Comment::findOrFail($id);
        $email = $comment->email;

        return view('backend.comment.sendemail', compact('email'));
    } // End Mehtod
    public function destroy($id)
    {

        Comment::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Mehtod


    public function read_at($id){

        $comment = Comment::find($id);

        Comment::findOrFail($comment->id)->update([
            'read_at'      => Carbon::now(),
        ]);

        return redirect()->route('admin.comments');
    }
}
