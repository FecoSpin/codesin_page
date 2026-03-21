<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\Departamento;
use File;

class PersonalController extends Controller
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
    public function create(Departamento $departamento)
    {
        //
        $staff = new Staff; 

        return view('dashboard.staff.create', compact('staff','departamento'));
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
        // dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'image|max:4048'

        ]);

        $maxposition = Staff::select('position')->where('departamento_id',$request->departamento_id)->max('position');
        $maxposition = $maxposition + 1;
        $staff = Staff::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'job' => $request->get('job'),
            'position' => $maxposition ,
            'departamento_id' =>  $request->departamento_id,
            'user_id' => Auth::id()
        ]);

        if ($request->files->has('thumbnail') ) {

            $filename = 'staff' . $staff->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlStaff = '/img/staff/'. $filename;
            $request->thumbnail->move(public_path('img/staff'),$filename);
            $staff->update(['urlimg' => $urlStaff]);
        }

        return redirect()->route('admin.staff.edit', $staff)->with('flash','El personal fue creado');
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
    public function edit(Staff $staff)
    {
        //
        $departamentos = Departamento::get();
        return view('dashboard.staff.edit', compact('staff', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'image|max:4048'

        ]);

        $staff->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'job' => $request->get('job'),
            'departamento_id' => $request->get('departamento_id')
        ]);

        if ($request->files->has('thumbnail') ) {
            $old_image = public_path().$staff->urlBanner;
            if (file_exists($old_image)) {

                File::delete($old_image);
         
            }

            $filename = 'staff' . $staff->id .'_'. time() . '.' . $request->thumbnail->extension();
            $urlStaff = '/img/staff/'. $filename;
            $request->thumbnail->move(public_path('img/staff'),$filename);
            $staff->update(['urlimg' => $urlStaff]);
        }

        return redirect()->route('admin.staff.edit', $staff)->with('flash','El personal fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
        $departamento_id = $staff->departamento_id;
        $staffs = Staff::where('departamento_id',$departamento_id)->orderBy('departamento_id')->get();
        $departamento = Departamento::where('id',$departamento_id)->first();
        $staff->delete();

        return redirect()->route('admin.departamentos.show',[ 'departamento' => $departamento, 'staffs'=>$staffs])->with('flash','El staff eliminado');
    }
    public function position_update(Request $request){
        $request->validate([
            'positions'=>'required'
        ]);
        
        foreach ($request->positions as $position){
            $index = $position[0];
            $newPosition = $position[1];
            $staff = Staff::find($index);
            $staff->position = $newPosition;
            
            $staff->save();
        }
        
        return response()->json('success');
    }
}
