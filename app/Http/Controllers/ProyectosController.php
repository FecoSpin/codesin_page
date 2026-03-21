<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ProyectosController extends Controller
{
    public function index(){
        {
            
            // $post = Post::Published()->where('category_id', 2)->get();
            
            // if( request()->wantsJson() )
            // {
            //     return $post;
            // }
            // return view('posts.show', compact('post'));

        }

        abort(404);
       
    }
    public function show(Post $post){
        {
            $post->load('photos', 'tags');

            if( request()->wantsJson() )
            {
                return ['post'=>$post];
            }

        }

        abort(404);
       
    }
}
