<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisoPrivacidadAreas extends Model
{
    //
    protected $table = 'aviso_privacidad_areas';
    protected $fillable = [
        'id_aviso',
        'vc_nombre'
    ];

    protected static function boot(){
        parent::boot();
        static::deleting(function($avisosarea){
            //eliminado las preguntas asosciadas
            $avisosarea->avisoscontenidos->each(function($avisocontenido){
              $avisocontenido->delete();
            });
        });
    }

    public function avisoscontenidos()
    {
        return $this->hasMany(AvisoPrivacidadContenidos::class, 'id_avisoArea');
    }
}
