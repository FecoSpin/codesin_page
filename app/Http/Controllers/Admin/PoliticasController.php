<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Photo;
use App\Category;
use Carbon\Carbon;
use File;

class PoliticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = Post::where('category_id',6)->get();
        return view('dashboard.politicas.index', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.politicas.create');
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
        $this->validate($request,['titlepoliticaModal' => 'required|min:3']);

        $post = Post::create( [
            'title' => $request->titlepoliticaModal,
            'category_id' => 6,
            'published_at' => Carbon::now(),
            ]);
        

        return redirect()->route('admin.politicas.edit', $post);
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
        return view('dashboard.politicas.edit', compact('post'));
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
        if( $post->title != $request->get('title')){
            
            $changeUrl =  true;
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

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'iframe' => $request->get('iframe'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
        ]);
          
        if($changeUrl){
            $post->generarUrl();
        }
       return redirect()->route('admin.politicas.edit', $post)->with('flash','Tu politica a sido guardada');
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
        $post->delete();
        return redirect()->route('admin.politicas.index')->with('flash','La Política publica a sido Eliminada');
    }
}
