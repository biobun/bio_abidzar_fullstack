const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
     require('postcss-import'),
     require('tailwindcss'),
     require('autoprefixer'),
 ]);
 */

mix
    .js('resources/js/app.js', 'public/js')
    .extract([
        'jquery',
        'bootstrap',
        '@popperjs',
        'datatables.net',
        'datatables.net-bs5',
        'datatables.net-buttons',
        'datatables.net-buttons-bs5',
    ])
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
