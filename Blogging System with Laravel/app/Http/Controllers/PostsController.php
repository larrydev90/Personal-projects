<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function post(Post $post){
        return view('post', ['post' => $post]);
    }

    public function newpost(Request $request){
        if ($request->method() == 'POST') {
            $post = new POST();
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->user_id = Auth::user()->id;
            if ($post->save()){
                echo "Η ανάρτηση καταχωρήθηκε επιτυχώς.";
                return redirect('/posts');
            };

        };
        return view('newpost');
    }

    
    public function edit_post(Post $post, Request $request){
        if (\Auth::user()->id != $post->user->id) return redirect('posts');
        if ($request->method() == 'POST') {
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            if ($post->save()){
                echo "Η ανάρτηση καταχωρήθηκε επιτυχώς.";
                return redirect('posts');
            };

        };
        return view('edit_post', ['post' => $post]);
    }

    public function search(Request $request){
        $q = $request->get('q', 'Δεν υπάρχει αναζήτηση');
        if (!$request->filled('q')) $q = 'Δεν υπάρχει αναζήτηση';
        else {
            // $posts = Post::where('title', 'like', '%'.$q .'%')->get();
            $posts = Post::where('title', 'like', '%'.$q .'%')->orWhere('body', 'like', '%'.$q .'%')->get();
        }
        return view('posts', ['posts' => $posts]);
    }

    public function delete_post(Post $post){
        if (\Auth::user()->id != $post->user->id) return redirect('posts');
        $post->delete();
        return redirect('posts');
    }

}
