<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonio;
use File;
class TestimoniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonios = Testimonio::get();
        return view('dashboard.testimonios.index', compact('testimonios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('dashboard.testimonios.create');
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
            'name' => 'required|string|max:255',
            'body' => 'required',
            // 'thumbnail' => 'image|max:4048'

        ]);

        $testimonio = Testimonio::create([
            'name' => $request->get('name'),
            'body' => $request->get('body')
        ]);

        if ($request->files->has('thumbnail') ) {

            $filename = 'testimonio' . $testimonio->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urltestimonio = '/img/testimonios/'. $filename;
            $request->thumbnail->move(public_path('img/testimonios'),$filename);
            $testimonio->update(['urlImg' => $urltestimonio]);
        }

        return redirect()->route('admin.testimonios.create', $testimonio)->with('flash','El testimonio fue creado');
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
    public function edit(Testimonio $testimonio)
    {
        //
        return view('dashboard.testimonios.edit', compact('testimonio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonio $testimonio)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:255',
            // 'thumbnail' => 'image|max:4048'

        ]);

        $testimonio->update([
            'name' => $request->get('name'),
            'body' => $request->get('body')
        ]);

        if ($request->files->has('thumbnail') ) {
            $old_image = public_path().$testimonio->urlImg;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'testimonio' . $testimonio->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urltestimonio = '/img/testimonios/'. $filename;
            $request->thumbnail->move(public_path('img/testimonios'),$filename);
            $testimonio->update(['urlImg' => $urltestimonio]);
        }

        return redirect()->route('admin.testimonios.edit', $testimonio)->with('flash','El testimonio fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonio $testimonio)
    {
        //
        $testimonio->delete();
        return redirect()->route('admin.staff.index')->with('flash','El testimonio fue eliminado');
    }
}
