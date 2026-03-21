<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    
    protected $table = 'personal';
    protected $fillable = ['departamento_id', 'position','urlimg', 'name', 'urlvideo', 'email', 'job','user_id'];

    public function departamento (){
        return $this->belongsTo('App\Models\Departamento','departamento_id');
    }

    public function scopeAllowed($query){
        return $query;
        
   }
}
