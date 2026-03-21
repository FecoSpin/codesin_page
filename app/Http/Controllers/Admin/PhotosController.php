<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Photo;
use App\Banner;

class PhotosController extends Controller
{
    //
    public function store(Post $post){
        $this->validate(request(),[
            'photo' => 'required|image|max:2048' // jpeg, pnp, bmp, gif, svg
        ]);
        
        // $photo =  request()->file('photo')->store('public');
        // $photoUrl = Storage::url($photo);
        // Photo::create([
        //     'url' => $photoUrl,
        //     'post_id' => $post->id
        // ]);
        $post->photos()->create([
            'url' => 'img/'. request()->file('photo')->store('posts','publicImg'),
        ]);
    }

    public function destroy(Photo $photo){

        // $photo->delete();
        // $photoPath = str_replace('storage','public',$photo->url);
        // Storage::delete($photoPath);
        // return back()->with('flash', 'Foto eliminada');
        
        $photo->delete();
        
        return back()->with('flash', 'Foto eliminada');
    }
    public function createImg(Request $request){
        $path = public_path().'/img/posts/';
            $files = $request->file('file');
            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
    }
}
