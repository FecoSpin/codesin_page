<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    //
    protected $guarded = [];

    protected static function boot(){
        parent::boot();
        static::deleting(function($photo){
            $photo->url = str_replace('img/','',$photo->url);
            Storage::disk('publicImg')->delete($photo->url);
        });
    }
}
