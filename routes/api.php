<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('aviso','PagesController@avisos');
Route::get('home','PagesController@home');
Route::get('homev2','PagesController@homev2');
Route::get('quienes-somos','PagesController@quienesSomos');
Route::get('que-hacemos', 'PagesController@queHacemos');
Route::get('historiaCodesin', 'PagesController@historia');
Route::get('covid', 'PagesController@covid');
Route::get('comunicacion','PagesController@comunicacion');
Route::get('sinaloaNumeros','PagesController@sinaloaNumeros');
Route::get('codetalks','PagesController@codetalks');
Route::get('codesinHechos','PagesController@codesinHechos');
Route::get('codetalks/{post}','codetalksController@show');
Route::get('proyectos/{post}','ProyectosController@show');
Route::get('tag/{tag}', 'TagsController@zonas');
Route::get('zonas/{tag}', 'TagsController@show');
Route::get('estrategias/{post}','EstrategiasController@show');
Route::get('noticias','NoticiasController@index');
Route::get('noticia/{post}','NoticiasController@show');
Route::get('articulos','NoticiasController@articulos');
Route::get('articulo/{post}','NoticiasController@artshow');
Route::get('indexsearch', 'PagesController@indexsearch');
Route::get('biblioteca', 'PagesController@biblioteca');
Route::post('email2', 'MailchimpTest@subscribe');
Route::get('posicionamiento','PagesController@posicionamiento');
Route::get('posicionamiento/{post}','PagesController@posicionamientoGet');
Route::get('sinaloa10noticias','NoticiasController@sinaloa10');


