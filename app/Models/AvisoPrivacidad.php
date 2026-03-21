<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisoPrivacidad extends Model
{
    //
    protected $table = 'aviso_pivacidad';
    protected $fillable = [
        'vc_nombre'
    ];

    public function avisosarea()
    {
        return $this->hasMany(AvisoPrivacidadAreas::class, 'id_aviso');
    }
}
