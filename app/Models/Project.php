<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['title','url','post_id', 'urlvideo', 'urlBanner', 'urlBannerMobile', 'excerpt','body','published_at'];

    public function getRouteKeyName(){
        return 'url';
    }

    public function estrategias(){
        return $this->hasOne('App\Post','id','post_id');
    }

    public function photos()
    {
        return $this->hasMany(ProjectPhoto::class);
    }

    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);
        $post->generarUrl();
       

        return $post;
    }

    public function generarUrl(){

        $url = str_slug($this->title);
        if($this->where('url', $url)->exists()){
            $url ="{$url}-{$this->id}";
        }
        $this->url = $url;
        $this->save();

    }
}
