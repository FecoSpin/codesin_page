<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\TagEstrategias;
use Carbon\Carbon;

class Post extends Model
{
    //
    protected $dates = ['published_at'];
    protected $fillable = ['title','url', 'externalUrl', 'urlvideo', 'urlBanner', 'urlBannerMobile', 'urlimage', 'urlimageMobile', 'excerpt','body','published_at','category_id', 'user_id'];

    protected $appends =  ['published_date'];

    protected static function boot(){
        parent::boot();
        static::deleting(function($post){
            //eliminado los tags asosciados
            $post->tags()->detach();
            //eliminando las fotos asosciadas y fisicas
            $post->photos->each(function($photo){
              $photo->delete();
            });
        });
    }

    public function getRouteKeyName(){
        return 'url';
    }

    public function category (){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function estrategias(){
        return $this->belongsToMany('App\Models\TagEstrategias');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function sections()
    {
        return $this->hasOne(Section::class);
    }

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopePublished($query){
        $query->with(['owner','category','tags','photos'])->whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at');
    }

    public function scopeAllowed($query){
        return $query;
    }

    public function isPublished(){
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();
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

    public function getPublishedDateAttribute(){
        return optional($this->published_at)->format('M d');
    }

    public function setPublishedAtAttribute($published_at_submit){

        $this->attributes['published_at'] =  $published_at_submit
                ? Carbon::parse($published_at_submit)
                : null;
    }

    public function syncTags($tags){
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });
        $this->tags()->sync($tagIds);
    }

    public function syncEstrategia($estrategia){
        $estrategiaIds = collect($estrategia)->map(function($estrategia){
            return TagEstrategias::find($estrategia) ? $estrategia : TagEstrategias::create(['name' => $estrategia])->id;
        });
        $this->estrategias()->sync($estrategiaIds);
    }

}
