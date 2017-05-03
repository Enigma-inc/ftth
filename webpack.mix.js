const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/material-kit.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        //  'resources/assets/css/select2.min.css',
        'node_modules/sweetalert2/dist/sweetalert2.min.css',
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/lib/smooth-div-scroll/css/smoothDivScroll.css'
    ], 'public/css/all.css')
    .js(['node_modules/select2/dist/js/select2.min.js'], 'public/js/bundle.js');