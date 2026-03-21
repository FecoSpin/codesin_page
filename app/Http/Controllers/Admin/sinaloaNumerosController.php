<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Models\PostExtras;
use App\Category;
use App\BannersPostIndex;
use Carbon\Carbon;
use File;

class sinaloaNumerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::allowed()->where('category_id',9)->get();
        $banners = BannersPostIndex::where('category_id', 9)->first();
        return view('dashboard.sinaloaNumeros.index', compact('posts', 'banners'));
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
        $this->validate($request,['titlesinaloaNumeros' => 'required|min:3']);

        $post = Post::create( [
            'title' => $request->titlesinaloaNumeros,
            'published_at' => Carbon::now(),
            'category_id' => 9
            ]);
        
        $extra = PostExtras::create([
            'post_id' => $post->id
        ]);

        return redirect()->route('admin.sinaloaNumeros.edit', $post);
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
    public function edit(Post $post)
    {
        //
        $tags = Tag::all();
        $extra = PostExtras::where('post_id', $post->id)->first();
        return view('dashboard.sinaloaNumeros.edit', compact('post', 'tags', 'extra'));
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
        $this->validate($request,['title' => 'required|min:3']);

        $changeUrl = false;
        if( $post->title != $request->get('title')){
            
            $changeUrl =  true;
        }

        if ($request->files->has('banner') ) {
            // $request->validate([
            //     'banner' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            // ]);

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

            // $request->validate([
            //     'bannerMobile' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            // ]);
            $old_image = public_path().$post->bannerMobile;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'banner_Mobile_' . $post->id .'_'. time() . '.' . $request->bannerMobile->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->bannerMobile->move(public_path('img/banners'),$filename);
            $post->update(['urlBannerMobile' => $urlBanner]);
        }

        if ($request->files->has('imgBody')) {

            // $request->validate([
            //     'imgBody' => 'image' // jpeg, pnp, bmp, gif, svg
            // ]);
            $old_image = public_path().$post->urlimage;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = $post->id .'_'. time() . '.' . $request->imgBody->extension();
            $urlBanner = '/img/sinnum/'. $filename;
            $request->imgBody->move(public_path('img/sinnum'),$filename);
            $post->update(['urlimage' => $urlBanner]);
        }
        if ($request->files->has('archivo')) {

            
            $old_image = public_path().$post->externalUrl;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = $post->id .'_'. time() . '.' . $request->archivo->extension();
            $urlArchivo = '/file/sinmun/'. $filename;
            $request->archivo->move(public_path('file/sinmun'),$filename);
            $post->update(['externalUrl' => $urlArchivo]);
        }

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'iframe' => $request->get('iframe'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
            'published_at' => $request->get('published_at_submit'),
        ]);
          
        $this->extraUpdate($post->id, $request);

        if($changeUrl){
            $post->generarUrl();
        }
       return redirect()->route('admin.sinaloaNumeros.edit', $post)->with('flash','Tu publicación a sido guardada');
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
        $this->imgagesDelete($post->id, $post);
        $post->delete();
        return redirect()->route('admin.sinaloaNumeros.index')->with('flash','Tu publicación a sido Eliminada');
    }
    public function extraUpdate ($id, $data){
        $postExtra = PostExtras::where('post_id',$id)->first();
        $url = 'img/banners/'.$id;

        if ($data->files->has('bannerHome')) {
        
            $old_image = public_path().$postExtra->urlbannerHome;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = $id.'_bh_'. time() . '.' . $data->bannerHome->extension();
            $urlComplete = '/img/banners/'.$id.'/'. $filename;
            $data->bannerHome->move(public_path($url),$filename);
            $postExtra->update(['urlbannerHome' => $urlComplete]);
        }
        if ($data->files->has('bannerHomeMobile')) {
            
            $old_image = public_path().$postExtra->urlbannerHomeMobile;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = $id.'_bhm_'. time() . '.' . $data->bannerHomeMobile->extension();
            $urlComplete = '/img/banners/'.$id.'/'. $filename;
            $data->bannerHomeMobile->move(public_path($url),$filename);
            $postExtra->update(['urlbannerHomeMobile' => $urlComplete]);
        }
        if ($data->files->has('thumbnailspotify')) {
            
            $old_image = public_path().$postExtra->urlthumbnailspotify;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = $id.'_thb_'. time() . '.' . $data->thumbnailspotify->extension();
            $urlComplete = '/img/banners/'.$id.'/'. $filename;
            $data->thumbnailspotify->move(public_path($url),$filename);
            $postExtra->update(['urlthumbnailspotify' => $urlComplete]);
        }

        $postExtra->update([
            'timeLectura' => $data->timeLectura,
            'indicadorLectura' => $data->indicadorLectura,
            'timeVideo' => $data->timeVideo,
            'indicadorVideo' => $data->indicadorVideo,
            'timePodcast' => $data->timePodcast,
            'indicadorPodcast' => $data->indicadorPodcast,
            'urlspotify' => $data->urlspotify
        ]);

    }

    public function imgagesDelete($id, $data){

        $postExtra = PostExtras::where('post_id',$id)->first();
        $urlbannerHome = public_path().$postExtra->urlbannerHome;
        $urlbannerHomeMobile = public_path().$postExtra->urlbannerHomeMobile;
        $urlthumbnailspotify = public_path().$postExtra->urlthumbnailspotify;
        $externalUrl = public_path().$data->externalUrl;
        $urlimage = public_path().$data->urlimage;
        $bannerMobile = public_path().$data->bannerMobile;
        $urlBanner = public_path().$data->urlBanner;
        
        if (file_exists($externalUrl)) {

            File::delete($externalUrl);
        
        }
        
        if (file_exists($urlimage)) {

            File::delete($urlimage);
        
        }
        
        if (file_exists($bannerMobile)) {

            File::delete($bannerMobile);
        
        }
       
        if (file_exists($urlBanner)) {

            File::delete($urlBanner);
        
        }
       
        
        if (file_exists($urlbannerHome)) {
            File::delete($urlbannerHome);
        
        }

        if (file_exists($urlbannerHomeMobile)) {
            File::delete($urlbannerHomeMobile);
        
        }

        if (file_exists($urlthumbnailspotify)) {
            File::delete($urlthumbnailspotify);
     
        }

    }
}
