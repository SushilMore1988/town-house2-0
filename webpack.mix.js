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

mix.js('resources/js/admin/app.js', 'public/admin/js')
	.js('resources/js/front/app.js', 'public/front/js')
    .sass('resources/sass/admin/app.scss', 'public/admin/css')
    .sass('resources/sass/front/app.scss', 'public/front/css');
    // .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

if (mix.inProduction()) {
    mix.version();
    mix.minify('public/front/css/app.css');
}