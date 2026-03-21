<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostExtras extends Model
{
    //
    protected $table = 'post_extra';
    protected $fillable = ['post_id',
        'urlbannerHome',
        'urlbannerHomeMobile',
        'urlthumbnailspotify',
        'urlspotify',
        'timeLectura',
        'indicadorLectura',
        'timeVideo',
        'indicadorVideo',
        'timePodcast',
        'indicadorPodcast'
    ];
}
