<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Photo;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use File;

class NoticiasController extends Controller
{
    //
    public function index(){
        $posts = Post::allowed()->where('category_id',2)->get();
        return view('dashboard.noticias.index', compact('posts'));
    }

    public function  create(){

        $tags = Tag::all();
        return view('dashboard.noticias.create', compact('tags'));

    }

    public function store(Request $request){
        
        $this->validate($request,['titleModal' => 'required|min:3']);

        $post = Post::create( [
            'title' => $request->titleModal,
            'category_id' => 2
            ]);
        

        return redirect()->route('admin.noticias.edit', $post);
    }

    public function edit(Post $post){
        
        $tags = Tag::all();

        return view('dashboard.noticias.edit', compact('post', 'tags'));
    }

    
    public function update(Post $post, Request $request){

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
            $old_image = public_path().$post->urlBannerMobile;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'banner_Mobile_' . $post->id .'_'. time() . '.' . $request->bannerMobile->extension();
            $urlBanner = '/img/banners/'. $filename;
            $request->bannerMobile->move(public_path('img/banners'),$filename);
            $post->update(['urlBannerMobile' => $urlBanner]);
        }
        if ($request->files->has('thumbnail')) {

            // $request->validate([
            //     'thumbnail' => 'image|max:2048' // jpeg, pnp, bmp, gif, svg
            // ]);
            $old_image = public_path().$post->urlimage;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'thumbnail_' . $post->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlthumbnail = '/img/banners/'. $filename;
            $request->thumbnail->move(public_path('img/banners'),$filename);
            $post->update(['urlimage' => $urlthumbnail]);
        }

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'iframe' => $request->get('iframe'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
            'published_at' => $request->get('published_at_submit'),
        ]);
          
        if($changeUrl){
            $post->generarUrl();
        }
       return redirect()->route('admin.noticias.edit', $post)->with('flash','Tu publicación a sido guardada');
    }

    public function destroy(Post $post){
        $this->imagesDelete($post->id, $post);
        $post->delete();
        return redirect()->route('admin.noticias.index')->with('flash','Tu publicación a sido Eliminada');
    }
    public function imagesDelete($id, $data){

        $urlBanner = public_path().$data->urlBanner;
        $bannerMobile = public_path().$data->urlBannerMobile;
        $urlimage = public_path().$data->urlimage;
       
        if (file_exists($urlBanner)) {

            File::delete($urlBanner);
        
        }
       
        
        if (file_exists($bannerMobile)) {
            File::delete($bannerMobile);
        
        }

        if (file_exists($urlimage)) {
            File::delete($urlimage);
     
        }
    }
}
