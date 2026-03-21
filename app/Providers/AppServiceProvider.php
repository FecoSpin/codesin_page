<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Tag;
use App\Models\Departamento;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        $tags = Tag::all();
        $departamentos = Departamento::all();
        // View::share('tags', Tag::all());
        View::share(['tags' => $tags, 'departamentos' => $departamentos]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
