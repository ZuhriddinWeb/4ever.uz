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
 .vue()
 .version()
 .postCss('resources/css/app.css', 'public/css', [
     //
 ]);
mix.disableSuccessNotifications();

if (mix.inProduction()) {
    mix.version()
    mix.webpackConfig({
        output: {
            filename:'[name].js',
            chunkFilename: 'js/[name].[chunkhash].js',
        },
    })
}