<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
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
    public function show(Tag $tag){
        {
            $tag->load('posts','banners');

            if( request()->wantsJson() )
            {
                return ['post'=>$tag];
            }

        }

        abort(404);
       
    }

    public function zonas(Tag $tag){
        {
            $tag->load('posts');
            $banner = '/img/default/banner.png';

            if( request()->wantsJson() )
            {
                return ['post'=>$tag, 'banner'];
            }

        }

        abort(404);
       
    }
}
