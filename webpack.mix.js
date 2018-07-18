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

mix.sass('resources/assets/sass/app.scss', 'public/css').sourceMaps();
mix.js('resources/assets/js/app.js', 'public/js').sourceMaps();


mix.browserSync('http://localhost:8000');

mix.webpackConfig({ devtool: "inline-source-map" });

