<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Models\TagEstrategias;

class EstrategiasController extends Controller
{
    //
    public function index(){
       
    }
    public function show(Post $post){
        {
            $post->load('photos');
            $estrategia = TagEstrategias::where('post_id',$post->id)->with('posts')->first();
            $proyectos = $estrategia->posts;

            if( request()->wantsJson() )
            {
                return ['post'=>$post, 'proyectos' => $proyectos];
            }

        }

        abort(404);
       
    }
}
