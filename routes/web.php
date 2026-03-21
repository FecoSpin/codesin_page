<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix'=>'admin', 'namespace' => 'Admin', 'middleware' => 'auth'],function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('posts', 'PostsController', ['except' => 'show','as' => 'admin' ]);
    Route::resource('users', 'UsersController', ['as' => 'admin' ]);
    Route::get('paginas/{post}/edit', 'PagesController@edit', ['as' => 'admin' ])->name('admin.paginas.edit');
    Route::put('paginas/{post}', 'PagesController@update', ['as' => 'admin' ])->name('admin.paginas.update');

    Route::resource('historia', 'HistoriaController', ['as' => 'admin' ])->parameters(['historia' => 'post']);
    Route::resource('covid', 'CovidController', ['as' => 'admin' ])->parameters(['covid' => 'post']);
    Route::post('codetalks/banners', 'BannersController@store', ['as' => 'admin' ])->name('admin.codetalks.banners');
    Route::post('codesinhechos/banners', 'BannersController@codesinHechos', ['as' => 'admin' ])->name('admin.codesinhechos.banners');
    Route::post('sinaloanumeros/banners', 'BannersController@sinaloaNumeros', ['as' => 'admin' ])->name('admin.sinaloanumeros.banners');

    Route::resource('codetalks', 'codetalksController', ['as' => 'admin' ])->parameters(['codetalks' => 'post']);
    Route::resource('codesinHechos', 'codesinHechosController', ['as' => 'admin' ])->parameters(['codesinHechos' => 'post']);
    Route::resource('sinaloaNumeros', 'sinaloaNumerosController', ['as' => 'admin' ])->parameters(['sinaloaNumeros' => 'post']);


    Route::post('post/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.update');
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
    Route::post('articulos/content_image', 'ArticulosController@image');

    //subir imagenes
    Route::post('paginas/{post}/photos', 'PhotosController@store')->name('admin.paginas.photos.update');
    Route::post('noticias/{post}/photos', 'PhotosController@store')->name('admin.noticias.photos.update');
    Route::post('proyectos/{post}/photos', 'PhotosController@store')->name('admin.proyectos.photos.update');
    Route::post('politicas/{post}/photos', 'PhotosController@store')->name('admin.politicas.photos.update');
    //carga de datos
    Route::resource('noticias', 'NoticiasController', ['except' => 'show','as' => 'admin'])->parameters(['noticias' => 'post']);
    Route::resource('articulos', 'ArticulosController', ['except' => 'show','as' => 'admin'])->parameters(['articulos' => 'post']);
    Route::resource('aviso', 'AvisosController', ['except' => 'show','as' => 'admin']);
    Route::delete('avisos/{id}', 'AvisosController@deleteArea', ['except' => 'show','as' => 'admin'])->name('admin.avisos.destroy');
    Route::resource('posicionamiento', 'PosicionamientoController', ['except' => 'show','as' => 'admin'])->parameters(['posicionamiento' => 'post']);
    Route::resource('proyectos', 'ProyectosController', ['except' => 'show','as' => 'admin'])->parameters(['proyectos' => 'post']);
    Route::resource('tags', 'TagsController', ['as' => 'admin']);
    Route::resource('departamentos', 'DepartamentosController', ['as' => 'admin']);
    Route::resource('staff', 'PersonalController', ['except' => ['show ', 'create'],'as' => 'admin']);
    Route::get('staff/create/{departamento}', 'PersonalController@create', ['except' => 'show','as' => 'admin'])->name('admin.staff.create');

    Route::resource('testimonios', 'TestimoniosController', ['except' => 'show','as' => 'admin']);
    Route::resource('contenidos', 'ContenidoInteresController', ['except' => 'show','as' => 'admin'])->parameters(['contenidos' => 'post']);
    Route::resource('estrategias', 'EstrategiasController', ['as' => 'admin'])->parameters(['estrategias' => 'post']);
    Route::resource('estrategiasProyectos', 'ProjectsController', ['as' => 'admin']);
    Route::resource('politicas', 'PoliticasController', ['except' => 'show','as' => 'admin'])->parameters(['politicas' => 'post']);
    Route::resource('biblioteca', 'BibliotecaController', ['as' => 'admin']);
    Route::get('biblioteca/get/{id}', 'BibliotecaController@getStates');
    // Route::get('biblioteca/create/{id}', 'BibliotecaController@create', ['as' => 'admin'])->name('admin.biblioteca.create');
    Route::get('excel/export', 'emailExport@export', ['as' => 'admin'])->name('admin.excel.export');

    Route::put('/position_update_posts','PersonalController@position_update')->name('position_update_posts');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/{any?}', 'PagesController@spa')->name('pages.home')->where('any','.*');
