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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
// mix.styles([
//    'public/assets/bundles/izitoast/css/iziToast.min.css',
//    'public/assets/js/page/toastr.js',
//    'public/assets/bundles/bootstrap-daterangepicker/daterangepicker.css',
//    'public/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
//    'public/assets/bundles/jquery-selectric/selectric.css',
//    'public/assets/bundles/datatables/datatables.min.css',
// ],'public/css/all.css');

// mix.scripts([
//    'public/assets/bundles/izitoast/js/iziToast.min.js',
//    'public/assets/js/page/toastr.js',
//    'public/assets/bundles/bootstrap-daterangepicker/daterangepicker.js',
//    'public/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
//    'public/assets/bundles/jquery-selectric/jquery.selectric.min.js',
//    'public/assets/bundles/datatables/datatables.min.js',
// ],'public/js/all.js');
