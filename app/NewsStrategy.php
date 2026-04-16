<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsStrategy extends Model
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'news_strategy_id');
    }
}
