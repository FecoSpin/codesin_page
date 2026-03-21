let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
   'resources/assets/dashboard/css/font-awesome.min.css',
   'resources/assets/dashboard/css/simple-line-icons.min.css',
   'resources/assets/dashboard/css/dropify.min.css',
   'resources/assets/dashboard/css/style.css'
], 'public/css/dashboard.css')
.scripts([
   'resources/assets/dashboard/js/jquery.min.js',
   'resources/assets/dashboard/js/popper.min.js',
   'resources/assets/dashboard/js/bootstrap.min.js',
   'resources/assets/dashboard/js/Chart.min.js',
   'resources/assets/dashboard/js/dropify.min.js',
   'resources/assets/dashboard/js/pace.min.js',
   'resources/assets/dashboard/js/template.js',
   'resources/assets/dashboard/js/sweetalert2.all.js'
], 'public/js/dashboard.js')
.js(['resources/assets/js/app.js'],'public/js/app.js')
.version()
.browserSync({
   proxy: 'http://codesin_mx.test/',
   open: 'Google chrome'
})
.sourceMaps();