<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Tag;
use App\Models\TagEstrategias;
use File;
use Carbon\Carbon;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        //
        $posts = Post::where('category_id',3)->get();
        return view('dashboard.proyectos.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        return view('dashboard.proyectos.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['titleProjectModal' => 'required|min:3']);

        $post = Post::create( [
            'title' => $request->titleProjectModal,
            'published_at' => Carbon::now(),
            'category_id' => 3
            ]);

        $post->syncTags($request->get('tags'));
        

        return redirect()->route('admin.proyectos.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post )
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        
        $tags = Tag::all();
        $estrategias = TagEstrategias::all();
        $post->load('tags', 'estrategias');
        return view('dashboard.proyectos.edit', compact('post', 'tags', 'estrategias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        //
        $changeUrl = false;
        if( $post->title != $request->get('title')){
            
            $changeUrl =  true;
        }
        if ($request->files->has('banner') ) {
            $request->validate([
                'banner' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            ]);

            $old_image = public_path().$post->urlBanner;
            
            if (file_exists($old_image) && $post->urlBanner != null) {

                File::delete($old_image);
         
            }

            $filename = 'banner_' . $post->id .'_'. time() . '.' . $request->banner->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->banner->move(public_path('img/banners'),$filename);
            $post->update(['urlBanner' => $urlBanner]);
        }
        if ($request->files->has('bannerMobile')) {

            $request->validate([
                'bannerMobile' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            ]);
            $old_image = public_path().$post->bannerMobile;
            if (file_exists($old_image) && $post->bannerMobile != null) {

                File::delete($old_image);
         
            }

            $filename = 'banner_Mobile_' . $post->id .'_'. time() . '.' . $request->bannerMobile->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->bannerMobile->move(public_path('img/banners'),$filename);
            $post->update(['urlBannerMobile' => $urlBanner]);
        }

        if ($request->files->has('thumbnail') ) {
            $old_image = public_path().$post->urlimage;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'proyecto' . $post->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlcontenido = '/img/proyecto/'. $filename;
            $request->thumbnail->move(public_path('img/proyecto'),$filename);
            $post->update(['urlimage' => $urlcontenido]);
        }

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'iframe' => $request->get('iframe'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
            
        ]);
          
        $post->syncTags($request->get('tags'));
        
        if (is_null($request->get('estrategias'))){
            $post->syncEstrategia($request->get('estrategias'));
        }
       
        if($changeUrl){
            $post->generarUrl();
        }
        
       return redirect()->route('admin.proyectos.edit', $post)->with('flash','Tu publicación a sido guardada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->load('tags');
        $tag = Tag::where('id',$post->tags[0]->id)->first();
        $post->delete();
        $tag->load('posts');
        $posts = $tag->posts;
        // return view('dashboard.proyectos.index', compact('posts', 'tag'));
        // return redirect()->route('dashboard.proyectos.index')->with('flash','Tu publicación a sido Eliminada');
        return view('dashboard.proyectos.index', compact('posts', 'tag'),
        ['flash'=>'Tu publicación a sido Eliminada']);
    }
}
