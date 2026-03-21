<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Models\TagEstrategias;
use Carbon\Carbon;
use File;

class EstrategiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = Post::where('category_id',5)->get();
        return view('dashboard.estrategias.index', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.estrategias.create');
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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'thumbnail' => 'image|max:4048'

        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'body' => $request->get('body'),
            'urlvideo' => $request->get('urlvideo'),
            'published_at' => Carbon::now(),
            'category_id' => 5
        ]);

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        if ($request->files->has('thumbnail') ) {

            $filename = 'estreategia' . $post->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlpost = '/img/estrategias/'. $filename;
            $request->thumbnail->move(public_path('img/estrategias'),$filename);
            $post->update(['urlimage' => $urlpost]);
        }

        if ($request->files->has('banner') ) {
            $request->validate([
                'banner' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            ]);

            $old_image = public_path().$post->urlBanner;
            if (file_exists($old_image)) {

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
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'banner_Mobile_' . $post->id .'_'. time() . '.' . $request->bannerMobile->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->bannerMobile->move(public_path('img/banners'),$filename);
            $post->update(['urlBannerMobile' => $urlBanner]);
        }

        return redirect()->route('admin.estrategias.create', $post)->with('flash','La estrategia fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $estrategia = TagEstrategias::where('post_id',$post->id)->with('posts')->first();
        $posts = $estrategia->posts;
        return view('dashboard.estrategiasProyectos.index', compact('estrategia', 'posts'));
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
        return view('dashboard.estrategias.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $changeUrl = false;
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'thumbnail' => 'image|max:4048'

        ]);

        if( $post->title != $request->get('title')){
            
            $changeUrl =  true;
        }

        $post->update([
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'body' => $request->get('body'),
            'urlvideo' => $request->get('urlvideo'),
        ]);

        $estrategia = TagEstrategias::where('post_id',$post->id)->first();

        $estrategia->name = $post->excerpt;
        $estrategia->save();
        $estrategia->generarUrl();


        if ($request->files->has('thumbnail') ) {
            $old_image = public_path().$post->urlimage;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'estrategia' . $post->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlpost = '/img/estrategias/'. $filename;
            $request->thumbnail->move(public_path('img/estrategias'),$filename);
            $post->update(['urlimage' => $urlpost]);
        }

        if ($request->files->has('banner') ) {
            $request->validate([
                'banner' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            ]);

            $old_image = public_path().$post->urlBanner;
            if (file_exists($old_image)) {

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
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'banner_Mobile_' . $post->id .'_'. time() . '.' . $request->bannerMobile->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->bannerMobile->move(public_path('img/banners'),$filename);
            $post->update(['urlBannerMobile' => $urlBanner]);
        }
        if($changeUrl){
            $post->generarUrl();
        }
        return redirect()->route('admin.estrategias.edit', $post)->with('flash','La estrategia fue actualizado');
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
        $estrategia = TagEstrategias::where('post_id',$post->id)->first();
        $estrategia->status = 0;
        $estrategia->save();

        $post->delete();
        return redirect()->route('admin.estrategias.index')->with('flash','La estrategia a sido Eliminada');
    }
}
