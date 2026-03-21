<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;
use App\Section;
use Carbon\Carbon;
use File;

class PagesController extends Controller
{
    //
    public function edit(Post $post){
        $post->load('category','photos','sections');
        return view('dashboard.principal.edit', compact('post'));
    }

    public function update(Post $post, Request $request){

        
        if ($request->files->has('banner')) {
            $request->validate([
                'banner' => 'required|image|max:4048' // jpeg, pnp, bmp, gif, svg
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
                'bannerMobile' => 'required|image|max:4048' // jpeg, pnp, bmp, gif, svg
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
        // actualizando imagen
        if ($request->files->has('img')) {
            $request->validate([
                'img' => 'required|image|max:4048' // jpeg, pnp, bmp, gif, svg
            ]);

            $old_image = public_path().$post->urlimage;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }
            $filename = 'img_' . $post->id .'_'. time() . '.' . $request->img->extension();
            $urlimage = '/img/'. $post->url .'/'. $filename;
            $folder = 'img/'.$post->url;
            $request->img->move($folder,$urlimage);
            $post->update(['urlimage' => $urlimage]);
        }
        //  actualizando imagen para mobile
        if ($request->files->has('imgMobile')) {
            $request->validate([
                'imgMobile' => 'required|image|max:4048' // jpeg, pnp, bmp, gif, svg
            ]);
            $old_image = public_path().$post->urlimageMobile;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }
            $filenameMobile = 'img_Mobile_' . $post->id .'_'. time() . '.' . $request->imgMobile->extension();
            $urlimgMobile = "/img/".$post->url.'/'. $filenameMobile;
            $folder = 'img/'.$post->url;
            $request->imgMobile->move($folder,$urlimgMobile);
            $post->update(['urlimageMobile' => $urlimgMobile]);
        }
        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'urlvideo' => $request->get('urlvideo'),
            'externalUrl' => $request->get('externalUrl')
        ]);

        if ($post->id == 1) {
            $section = Section::where('post_id',1)->first();
            $section->update([
                'title' => $request->get('titleSection'),
                'body' => $request->get('bodySection'),
                'icon1' => $request->get('icon1'),
                'icon1_popover' => $request->get('icon1_popover'),
                'icon2' => $request->get('icon2'),
                'icon2_popover' => $request->get('icon2_popover'),
                'icon3' => $request->get('icon3'),
                'icon3_popover' => $request->get('icon3_popover'),
                'icon4' => $request->get('icon4'),
                'icon4_popover' => $request->get('icon4_popover'),
                'icon5' => $request->get('icon5'),
                'icon5_popover' => $request->get('icon5_popover'),
                'icon6' => $request->get('icon6'),
                'icon6_popover' => $request->get('icon6_popover'),
                'icon7' => $request->get('icon7'),
                'icon7_popover' => $request->get('icon7_popover'),
                'icon8' => $request->get('icon8'),
                'icon8_popover' => $request->get('icon8_popover'),
                'icon9' => $request->get('icon9'),
                'icon9_popover' => $request->get('icon9_popover'),
                'icon10' => $request->get('icon10'),
                'icon10_popover' => $request->get('icon10_popover'),
                'icon11' => $request->get('icon11'),
                'icon11_popover' => $request->get('icon11_popover'),
                'icon12' => $request->get('icon12'),
                'icon12_popover' => $request->get('icon12_popover'),

            ]);
            $this->iconsUpdate($post->id, $request);
        }


        
       return redirect()->route('admin.paginas.edit', $post)->with('flash','La pagina ha sido actualizada');
    } 

    public function iconsUpdate ($id, $data){

        if ($data->files->has('icon1_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon1_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon1 .'_'. time() . '.' . $data->icon1_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon1_img->move(public_path('img/icons'),$filename);
            $section->update(['icon1_img' => $urlicon]);
        }
        if ($data->files->has('icon2_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon2_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon2 .'_'. time() . '.' . $data->icon2_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon2_img->move(public_path('img/icons'),$filename);
            $section->update(['icon2_img' => $urlicon]);
        }
        if ($data->files->has('icon3_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon3_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon3 .'_'. time() . '.' . $data->icon3_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon3_img->move(public_path('img/icons'),$filename);
            $section->update(['icon3_img' => $urlicon]);
        }
        if ($data->files->has('icon4_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon4_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon4 .'_'. time() . '.' . $data->icon4_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon4_img->move(public_path('img/icons'),$filename);
            $section->update(['icon4_img' => $urlicon]);
        }
        if ($data->files->has('icon5_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon5_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon5 .'_'. time() . '.' . $data->icon5_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon5_img->move(public_path('img/icons'),$filename);
            $section->update(['icon5_img' => $urlicon]);
        }
        if ($data->files->has('icon6_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon6_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon6 .'_'. time() . '.' . $data->icon6_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon6_img->move(public_path('img/icons'),$filename);
            $section->update(['icon6_img' => $urlicon]);
        }
        if ($data->files->has('icon7_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon7_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon7 .'_'. time() . '.' . $data->icon7_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon7_img->move(public_path('img/icons'),$filename);
            $section->update(['icon7_img' => $urlicon]);
        }
        if ($data->files->has('icon8_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon8_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon8 .'_'. time() . '.' . $data->icon8_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon8_img->move(public_path('img/icons'),$filename);
            $section->update(['icon8_img' => $urlicon]);
        }
        if ($data->files->has('icon9_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon9_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon9 .'_'. time() . '.' . $data->icon9_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon9_img->move(public_path('img/icons'),$filename);
            $section->update(['icon9_img' => $urlicon]);
        }
        if ($data->files->has('icon10_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon10_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon10 .'_'. time() . '.' . $data->icon10_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon10_img->move(public_path('img/icons'),$filename);
            $section->update(['icon10_img' => $urlicon]);
        }
        if ($data->files->has('icon11_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon11_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon11 .'_'. time() . '.' . $data->icon11_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon11_img->move(public_path('img/icons'),$filename);
            $section->update(['icon11_img' => $urlicon]);
        }
        if ($data->files->has('icon12_img')) {
            
            $section = Section::where('post_id',$id)->first();
            $old_image = public_path().$section->icon12_img;
            if (file_exists($old_image)) {
                File::delete($old_image);
         
            }

            $filename = 'icons_' . $data->icon12 .'_'. time() . '.' . $data->icon12_img->extension();
            $urlicon = '/img/icons/'. $filename;
            $data->icon12_img->move(public_path('img/icons'),$filename);
            $section->update(['icon12_img' => $urlicon]);
        }
    }
}
