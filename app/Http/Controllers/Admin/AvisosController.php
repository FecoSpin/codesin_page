<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AvisoPrivacidad;
use App\Models\AvisoPrivacidadAreas;
use App\Models\AvisoPrivacidadContenidos;
use Illuminate\Support\Arr;
use DB;
use File;
use Carbon\Carbon;
class AvisosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aviso = AvisoPrivacidad::first();
        if(empty($aviso)){
            $aviso = AvisoPrivacidad::firstOrCreate([
                'vc_nombre' => 'Avisos de Privacidad del Consejo para el Desarrollo Económico (CODESIN)'
            ]);
            return view('dashboard.aviso.create');
        }else{
            return view('dashboard.aviso.edit', compact('aviso'));

        }
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
        $this->validate($request,[
                'vc_nombre' => 'required|min:3',
                'avisoAreas.*.vc_nombre' => 'required | min:3'
            ],
            [
                'vc_nombre.min' => 'El títulos debe contener al menos 3 caracteres.',
                'avisoAreas.*.vc_nombre.min' => 'Los títulos debe contener al menos 3 caracteres.',
            ]
        );
        $aviso = ['vc_nombre'];
        $aviso_area = ['id_aviso', 'vc_nombre'];
        $aviso_contenido = ['id_avisoArea', 'vc_nombre'];

        try {
            //code...
            DB::beginTransaction();
            $aviso = AvisoPrivacidad::first();
            $aviso->update([ 'vc_nombre' => $request['vc_nombre']]);
            foreach ($request->avisoAreas as $avisoArea) {
                $nuevoAviso_area = AvisoPrivacidadAreas::create([
                    'id_aviso' => $aviso->id,
                    'vc_nombre' => $avisoArea['vc_nombre']
                ]);
                foreach ($avisoArea["addMoreInputFields"] as $avisoContenido){
                    $nuevoAviso_contenido = AvisoPrivacidadContenidos::create([
                        'id_avisoArea' => $nuevoAviso_area->id,
                        'vc_nombre' => $avisoContenido['vc_nombre']
                    ]);
                    if ($avisoContenido['archivo']->isFile()) {
                        $this->fileUpdate($nuevoAviso_contenido->id, $avisoContenido['archivo']);
                     }
                }
            };
            DB::commit();
            return redirect()->route('admin.aviso.index', $aviso)->with('flash','Los avisos de provacidad han sido guardados');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response(['message' => 'error al registrar', 'error' => $th->getMessage()], 403);
        }
        

        // return redirect()->route('admin.articulos.edit', $post);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
                'vc_nombre' => 'required|min:3',
                'avisoAreas.*.vc_nombre' => 'required | min:3'
            ],
            [
                'vc_nombre.min' => 'El títulos debe contener al menos 3 caracteres.',
                'avisoAreas.*.vc_nombre.min' => 'El campo Título o área es obligatorio y debe contener por lo menos 1 registro de Nombre de archivo y 1 archivo seleccionado.',
                'avisoAreas.*.vc_nombre.required' => 'El campo Título o área es obligatorio y debe contener por lo menos 1 registro de Nombre de archivo y 1 archivo seleccionado.',
            ]
        );
        try {
            //code...
            DB::beginTransaction();
            $aviso = AvisoPrivacidad::first();
            $aviso->update([ 'vc_nombre' => $request['vc_nombre']]);
            foreach ($request->avisoAreas as $avisoArea) {
                if(isset($avisoArea['id'])){
                    $getAviso = AvisoPrivacidadAreas::where('id',$avisoArea['id'])->first();
                    $getAviso->update(['vc_nombre' => $avisoArea['vc_nombre']]);
                    if(isset($avisoArea["addMoreInputFields"])){
                        foreach ($avisoArea["addMoreInputFields"] as $avisoContenido){
                            if(isset($avisoContenido['id'])){
                                $getAvisoContenido = AvisoPrivacidadContenidos::where('id',$avisoContenido['id'])->first();
                                $getAvisoContenido->update(['vc_nombre' => $avisoContenido['vc_nombre']]);
                                if ( isset($avisoContenido['archivo']) && $avisoContenido['archivo']->isFile()) {
                                    var_dump($avisoContenido["vc_nombre"]." tengo archivo ");
                                    $this->fileUpdate($avisoContenido['id'], $avisoContenido['archivo']);
                                }
                                }else{
                                    $nuevoAviso_contenido = AvisoPrivacidadContenidos::create([
                                        'id_avisoArea' => $avisoArea['id'],
                                        'vc_nombre' => $avisoContenido['vc_nombre']
                                    ]);
                                    if ( isset($avisoContenido['archivo']) && $avisoContenido['archivo']->isFile()) {
                                        $this->fileUpdate($nuevoAviso_contenido->id, $avisoContenido['archivo']);
                                    }
                                }
                        }
                    }
                }else{
                    $nuevoAviso_area = AvisoPrivacidadAreas::create([
                        'id_aviso' => $aviso->id,
                        'vc_nombre' => $avisoArea['vc_nombre']
                    ]);
                    foreach ($avisoArea["addMoreInputFields"] as $avisoContenido){
                        $nuevoAviso_contenido = AvisoPrivacidadContenidos::create([
                            'id_avisoArea' => $nuevoAviso_area->id,
                            'vc_nombre' => $avisoContenido['vc_nombre']
                        ]);
                        if ($avisoContenido['archivo']->isFile()) {
                            $this->fileUpdate($nuevoAviso_contenido->id, $avisoContenido['archivo']);
                        }
                    }
                }
            };
            DB::commit();
            return redirect()->route('admin.aviso.index', $aviso)->with('flash','Los avisos de provacidad han sido guardados');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response(['message' => 'error al registrar', 'error' => $th->getMessage()], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy( $id)
    {
        //
        $contenido = AvisoPrivacidadContenidos::where('id',$id)->first();
        $this->deleteFile($contenido);
        $contenido->delete();
        return redirect()->route('admin.aviso.index')->with('flash','Los avisos de provacidad han sido eliminado');
    }

    public function deleteArea($id)
    {
        //
        $areas = AvisoPrivacidadAreas::where('id',$id)->first();
        $contenidos = $areas->avisoscontenidos;
        foreach ($contenidos as $key => $contenido) {
            $this->deleteFile($contenido);
            $contenido->delete();
        }
        
        $areas->delete();
        // return redirect()->route('admin.articulos.index')->with('flash','Tu publicación a sido Eliminada');
        return redirect()->route('admin.aviso.index')->with('flash','Los avisos de provacidad han sido eliminado');
    }

    public function file (Request $request){

        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240', //10Mb
        ]);

        $filename = time().".".$request->image->extension();

        $request->image->move(public_path('img/images_post/'.$request->post_id.'/'),$filename);

        return response()->json(["default" => URL::to("/") . '/img/images_post/'.$request->post_id.'/' . $filename]);
    }
    public function fileUpdate ($id, $data){
        // $id = es el id del achivo
        // data informacion captura
        $fileInfo = AvisoPrivacidadContenidos::where('id',$id)->first();
        $url = 'file/avisos';

        $filename = $id.'_'.$data->getClientOriginalName();
        $urlComplete = '/'.$url.'/'. $filename;

        if ($fileInfo->vc_url != NULL) {
            $old_archivo = public_path().$fileInfo->vc_url;
            if (file_exists($old_archivo)) {
                File::delete($old_archivo);
         
            }
            
            $data->move(public_path($url),$filename);
            $fileInfo->vc_url = $urlComplete;
            $fileInfo->save();
            // $fileInfo->update(['vc_url' => $urlComplete]); 
        }else{
            $data->move(public_path($url),$filename);
            $fileInfo->update(['vc_url' => $urlComplete]); 
        }
    }
    public function deleteFile ($data){
        $old_archivo = public_path().$data->vc_url;
        if (file_exists($old_archivo)) {
            File::delete($old_archivo);
        
        }
    }
}
