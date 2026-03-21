<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannersPostIndex extends Model
{
    //bannes_posts_index
    protected $table = 'bannes_posts_index';
    protected $fillable = [
        'category_id',
        'urlBanner',
        'urlBannerMobile'
    ];
}
