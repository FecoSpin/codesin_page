<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Banner;
use File;

class TagsController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        $tag->load('posts');
        $posts = $tag->posts;
        return view('dashboard.proyectos.index', compact('posts', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $banner = Banner::where('tag_id',$tag->id)->first();

        if($banner == null)
            {
                $banner = Banner::create([
                        'tag_id' => $tag->id,
                        'urlvideo' => $request->urlvideo
                    ]);
            }
            else{
                $banner->update([
                    'urlvideo' => $request->urlvideo
                ]);
            }
        if ($request->files->has('banner')) {
            $request->validate([
                'banner' => 'required|image|max:2048' // jpeg, pnp, bmp, gif, svg
            ]);
            
            
            $old_image = public_path().$banner->urlBanner;
            // dd(file_exists($old_image));
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'bannerZona_' . $tag->id .'_'. time() . '.' . $request->banner->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->banner->move(public_path('img/banners'),$filename);
            $banner->update(['urlBanner' => $urlBanner]);
        }
        if ($request->files->has('bannerMobile')) {
            
            $request->validate([
                'bannerMobile' => 'required|image|max:2048' // jpeg, pnp, bmp, gif, svg
            ]);
            $old_image = public_path().$tag->bannerMobile;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'bannerZona_Mobile_' . $tag->id .'_'. time() . '.' . $request->bannerMobile->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->bannerMobile->move(public_path('img/banners'),$filename);
            $banner->update(['urlBannerMobile' => $urlBanner]);
        }

        $tag->load('posts','banners');
        $posts = $tag->posts;
        return view('dashboard.proyectos.index', compact('posts', 'tag'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
