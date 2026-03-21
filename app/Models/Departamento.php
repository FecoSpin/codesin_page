<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = 'departamentos';

    public function staff(){
        return $this->hasMany('App\Models\Staff');
    }

    public function staffs(){
        return $this->hasMany(Staff::class,'departamento_id');
    }
}
