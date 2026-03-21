<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectPhotosController extends Controller
{
    //
    public function store(Project $Project){
        $this->validate(request(),[
            'photo' => 'required|image|max:2048' // jpeg, pnp, bmp, gif, svg
        ]);
        $Project->photos()->create([
            'url' => 'img/'. request()->file('photo')->store('posts','publicImg'),
        ]);
    }
}
