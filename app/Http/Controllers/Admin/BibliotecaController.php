<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Biblioteca;
use App\Models\BibliotecaCategories;
use App\Models\BibliotecaSubcategories;
use Carbon\Carbon;
use DB;
use File;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = Biblioteca::selectRaw('biblioteca.*, Categories.id as Category_id, Categories.nombre as Category_nombre, subCategories.id as subCategories_id, subCategories.nombre as subCategories_nombre')->join('biblioteca_categries as Categories', 'Categories.id', '=', 'biblioteca.category_id')->leftJoin('biblioteca_subcategories as subCategories', 'subCategories.id', '=', 'biblioteca.subcategory_id')->orderby('biblioteca.category_id','ASC')->orderby('biblioteca.subcategory_id','ASC')->get();
        // return view('dashboard.biblioteca.index', compact('Posts', 'category_id'));
        return view('dashboard.biblioteca.index', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $category_id = $id;
        $categories = BibliotecaCategories::where('id','>' ,8)->get();
        $subcategories = BibliotecaSubcategories::get();
        return view('dashboard.biblioteca.create', compact('categories','subcategories'));
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
        // $this->validate($request,['title' => 'required|min:3']);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'archivo' => 'required'
        ]);
        $data = Biblioteca::create([
            'titulo' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'subcategory_id' => $request->get('subcategory_id'),
            'excerpt' => $request->get('excerpt'),
            'published_at' => $request->get('published_at_submit'),
        ]);

        $this->fileUpdate($data->id, $request, 1);

        return redirect()->route('admin.biblioteca.edit', $data)->with('flash','Tu publicación a sido guardada');

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
        $category_id = $id;
        $Posts = Biblioteca::selectRaw('biblioteca.*,subCategories.id as subCategories_id, subCategories.nombre as subCategories_nombre')->join('biblioteca_subcategories as subCategories', 'subCategories.id', '=', 'biblioteca.subcategory_id')->where('category_id',$id)->get();
        return view('dashboard.biblioteca.index', compact('Posts', 'category_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Biblioteca $biblioteca)
    {
        //
        $categories = BibliotecaCategories::where('id','>' ,8)->get();
        $subcategories = BibliotecaSubcategories::get();
        // $subcategories = BibliotecaSubcategories::where('id_category',$biblioteca->category_id)->get();
        return view('dashboard.biblioteca.edit', compact('biblioteca', 'categories','subcategories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biblioteca $biblioteca)
    {
        //
        $this->validate($request,[
            'titulo' => 'required|min:3',
            'excerpt' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);
        $biblioteca->update([
            'titulo' => $request->get('titulo'),
            'excerpt' => $request->get('excerpt'),
            'category_id' => $request->get('category_id'),
            'subcategory_id' => $request->get('subcategory_id'),
            'published_at' => $request->get('published_at_submit'),
        ]);

        if($request->files->has('archivo')){
            $this->fileUpdate($biblioteca->id, $request, 2);
        }

        return redirect()->route('admin.biblioteca.edit', $biblioteca)->with('flash','Tu publicación a sido guardada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biblioteca $biblioteca)
    {
        //
        $category_id = $biblioteca->category_id;
        $this->deleteFile($biblioteca->id, $biblioteca);
        $biblioteca->delete();
        $Posts = Biblioteca::where('category_id',$category_id)->get();
        return redirect()->route('admin.biblioteca.show',['id' => $category_id])->with('flash','Tu publicación a sido Eliminada');
    }
    public function fileUpdate ($id, $data, $status){
        // $id = es el id del achivo
        // data informacion captura
        // status = 1 nuevo, 2 update
        $fileInfo = Biblioteca::where('id',$id)->first();
        $url = 'file/'.$fileInfo->category_id;
        $filename = $id.'_'.$data->archivo->getClientOriginalName().'_'. time() . '.' . $data->archivo->extension();
        $urlComplete = '/'.$url.'/'. $filename;

        if ($data->files->has('archivo') && $status ==2) {

            $old_archivo = public_path().$fileInfo->urlArchivo;
            if (file_exists($old_archivo)) {
                File::delete($old_archivo);

            }

            $data->archivo->move(public_path($url),$filename);
            $fileInfo->update(['urlArchivo' => $urlComplete]);
        }else{

            $data->archivo->move(public_path($url),$filename);
            $fileInfo->update(['urlArchivo' => $urlComplete]);
        }
    }
    public function deleteFile ($id, $data){
        $old_archivo = public_path().$data->urlArchivo;
        if (file_exists($old_archivo)) {
            File::delete($old_archivo);

        }
    }

    public function getStates ($id){
        $subcategories = BibliotecaSubcategories::where("id_category",$id)->pluck("nombre","id");

        return json_encode($subcategories);
    }
}
