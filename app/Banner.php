<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $guarded = [];
    protected static function boot(){
        parent::boot();
        static::deleting(function($photo){
            $banner->urlBanner = str_replace('img/','',$photo->urlBanner);
            Storage::disk('publicImg')->delete($urlBanner->urlBanner);
        });
    }

}
