<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class NoticiasController extends Controller
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

            $post->load('photos');

            if( request()->wantsJson() )
            {
                return $post;
            }
            return view('posts.show', compact('post'));

        }

        abort(404);

    }
    public function articulos(){
        {
            $post = Post::Published()->where('category_id', 11)->orderBy('published_at','desc')->get();

            if( request()->wantsJson() )
            {
                return $post;
            }
            return view('posts.show', compact('post'));

        }

        abort(404);

    }
    public function artshow(Post $post){
        {

            $post->load('photos');
            
            if( request()->wantsJson() )
            {
                
                $more = Post::Published()->where('category_id', 11)->whereNotIn('id',[$post->id])->orderBy('published_at','desc')->take(3)->get();
                return compact('post','more');
            }

        }

        abort(404);

    }
    public function sinaloa10(){
        {
            $post = Post::Published()->where('category_id', 2)->where('news_strategy_id', 2)->take(3)->get();

            if( request()->wantsJson() )
            {
                return $post;
            }
            return view('posts.show', compact('post'));

        }

        abort(404);

    }

    public function sinaloa10All(){
        {
            $post = Post::Published()->where('category_id', 2)->where('news_strategy_id', 2)->get();

            if( request()->wantsJson() )
            {
                return $post;
            }
            return view('posts.show', compact('post'));

        }

        abort(404);

    }
}
