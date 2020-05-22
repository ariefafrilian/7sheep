const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// assets frontend
mix.styles([
    'vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css',
    'vendor/almasaeed2010/adminlte/plugins/dropzone/dist/min/dropzone.min.css',
    'vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css',
], 'public/css/frontend.css').version();

mix.scripts([
    'vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js',
    'vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'vendor/almasaeed2010/adminlte/plugins/dropzone/dist/min/dropzone.min.js',
    'vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js',
], 'public/js/frontend.js').version();

// assets auth
mix.styles([
    'vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css',
    'vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css',
], 'public/css/auth.css').version();

mix.scripts([
    'vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js',
    'vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js',
    'resources/js/custom-auth.js',
], 'public/js/auth.js').version();
