<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagEstrategias extends Model
{
    //
    protected $table = 'tag_estrategias';
    protected $fillable = ['post_id', 'name', 'url'];

    public function posts(){
        return $this->belongsToMany('App\Post');
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
