<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisoPrivacidadContenidos extends Model
{
    //
    protected $table = 'aviso_provacidad_contenido';
    protected $fillable = [
        'id_avisoArea',
        'vc_nombre',
        'vc_url'
    ];
}
