<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 

class codetalksController extends Controller
{
    //
    public function index(){
        {
            $post = Post::Published()->where('category_id', 2)->get();
            
            if( request()->wantsJson() )
            {
                return $post;
            }
            return view('posts.show', compact('post'));

        }

        abort(404);
       
    }
    public function show(Post $post){
        {
            
            // $post->load('photos')->join('post_extra', $post->id, '=', 'post_extra.post_id');
            $post = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('posts.id',$post->id)->first();
            $more = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',$post->category_id)->orderBy('published_at','DESC')->take(3)->get();
            if( request()->wantsJson() )
            {
                return [ 'post'=> $post, 'more' => $more];
            }
            return view('posts.show', compact('post'));

        }

        abort(404);
       
    }
}
