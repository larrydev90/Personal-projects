<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function new_comment(Post $post, Request $request){
        if ($request->method() == 'POST') {
            $comment = new Comment();
            $comment->comment = $request->get('comment');
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $post->id;
            if ($comment->save()){
                echo "Το σχόλιο καταχωρήθηκε επιτυχώς.";
                return redirect()->route("post", $post);
            };

        };
        return view('newcomment', ['post' => $post]);
    }
}
