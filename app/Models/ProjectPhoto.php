<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPhoto extends Model
{
    //
    protected $table = 'proyect_photos';
    protected $guarded = [];

    protected static function boot(){
        parent::boot();
        static::deleting(function($photo){
            $photo->url = str_replace('img/','',$photo->url);
            Storage::disk('publicImg')->delete($photo->url);
        });
    }
}
