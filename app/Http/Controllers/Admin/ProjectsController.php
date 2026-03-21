<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Models\TagEstrategias;
use File;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request,['title' => 'required|min:3']);

        $post = Post::create( [
            'title' => $request->title,
            'published_at' => Carbon::now(),
            'category_id' => 3
            ]);

        $post->syncEstrategia($request->get('tag_estrategias_id'));
        

        return redirect()->route('admin.estrategiasProyectos.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $estrategiasProyecto)
    {
        //
        $tags = Tag::all();
        $post = $estrategiasProyecto->load('estrategias');
        $return = Post::where('id',$post->estrategias[0]->post_id)->first();
        return view('dashboard.estrategiasProyectos.edit', compact('post', 'tags', 'return'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $estrategiasProyecto)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required',
            'body' => 'required',

        ]);
        $post = $estrategiasProyecto;
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

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'iframe' => $request->get('iframe'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
            
        ]);
          
        $post->syncTags($request->get('tag_id'));

        $post = $estrategiasProyecto->load('estrategias');
        $return = Post::where('id',$post->estrategias[0]->post_id)->first();
        
       return redirect()->route('admin.estrategiasProyectos.edit', ['post'=>$post, 'return' => $return])->with('flash','Tu publicación a sido guardada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $estrategiasProyecto)
    {
        //obtenemos la estrategia
        $post = $estrategiasProyecto->load('estrategias');
        // eliminamos el proyecto
        $estrategiasProyecto->delete();
        // obtenemos datos para regresar 
        $return = Post::where('id',$post->estrategias[0]->post_id)->first();
        return redirect()->route('admin.estrategias.show', $return)->with('flash','Tu publicación a sido eliminado');
        
        
    }
}
