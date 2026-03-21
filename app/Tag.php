<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name', 'url'];
    
    public function getRouteKeyName(){
        return 'url';
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function banners(){
        return $this->hasOne(Banner::class);
    }

    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);
        $post->generarUrl();
       

        return $post;
    }

    public function generarUrl(){

        $url = str_slug($this->name);
        if($this->where('url', $url)->exists()){
            $url ="{$url}-{$this->id}";
        }
        $this->url = $url;
        $this->save();

    }
}
