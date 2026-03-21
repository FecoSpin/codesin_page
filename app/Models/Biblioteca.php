<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    //
    protected $table = 'biblioteca';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'titulo',
        'excerpt',
        'published_at',
        'urlArchivo'
    ];
    // public function subCategories(){
    //     return $this->hasMany(BibliotecaSubcategories::class,'subcategory_id');
    // }

    public function subCategories (){
        return $this->belongsTo('App\Models\BibliotecaSubcategories','subcategory_id');
    }
}
