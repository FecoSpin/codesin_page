<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use Carbon\Carbon;
use File;

class ContenidoInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = Post::where('category_id',4)->get();
        return view('dashboard.contenidos.index', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.contenidos.create');
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
            'thumbnail' => 'image|max:4048'

        ]);

        $contenido = Post::create([
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
            'published_at' => Carbon::now(),
            'category_id' => 4
        ]);

        if ($request->files->has('thumbnail') ) {

            $filename = 'contenido' . $contenido->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlcontenido = '/img/contenidos/'. $filename;
            $request->thumbnail->move(public_path('img/contenidos'),$filename);
            $contenido->update(['urlimage' => $urlcontenido]);
        }

        return redirect()->route('admin.contenidos.create', $contenido)->with('flash','El contenido de interes fue creado');
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
    public function edit(Post $post){
        
        // $tags = Tag::all();

        return view('dashboard.contenidos.edit', compact('post'));
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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'image|max:4048'

        ]);

        $post->update([
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'urlvideo' => $request->get('urlvideo'),
            'published_at' => $request->get('published_at_submit'),
        ]);

        if ($request->files->has('thumbnail') ) {
            $old_image = public_path().$post->urlimage;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'contenido' . $post->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlcontenido = '/img/contenidos/'. $filename;
            $request->thumbnail->move(public_path('img/contenidos'),$filename);
            $post->update(['urlimage' => $urlcontenido]);
        }

        return redirect()->route('admin.contenidos.edit', $post)->with('flash','El contenido de interes fue actualizado');
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
        return redirect()->route('admin.contenidos.index')->with('flash','El contenido de interes a sido Eliminada');
    }
}
