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

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('node_modules/select2/dist/js/select2.min.js', 'public/js/select2.min.js')
    .css('node_modules/select2/dist/css/select2.min.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
