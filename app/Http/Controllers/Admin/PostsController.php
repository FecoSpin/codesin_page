<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    // protected guarde
    public function index(){
        $posts = Post::allowed()->get();
        // $posts = auth()->user()->posts;
        // $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function  create(){
        $this->authorize('create',  new Post);
        $categories = Category::All();
        return view('admin.posts.create', compact('categories'));

    }
    public function store(Request $request){
        
        $this->validate($request,['title' => 'required|min:3']);

        $post = Post::create( $request->all());
        $post->syncTags($request->get('tags'));
        

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post){
        
        $this->authorize('update', $post);

        $categories = Category::All();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    public function update(Post $post, StorePostRequest $request){
        $changeUrl = false;
        if( $post->title != $request->get('title')){
            
            $changeUrl =  true;
        }
        $this->authorize('update', $post);
        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'iframe' => $request->get('iframe'),
            'excerpt' => $request->get('excerpt'),
            'published_at' => $request->get('published_at_submit'),
            'category_id' => $request->get('category_id'),
            'user_id' => Auth::id()
        ]);        
        $post->syncTags($request->get('tags'));
        if($changeUrl){
            $post->generarUrl();
        }
       return redirect()->route('admin.posts.edit', $post)->with('flash','Tu publicación a sido guardada');
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('flash','Tu publicación a sido Eliminada');
    }
}
