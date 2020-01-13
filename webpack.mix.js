const {mix} = require('laravel-mix');

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

mix.combine([
        'resources/assets/js/main.js',
        'resources/assets/js/init.js',
    ], 'public/js/app.js')
    .sourceMaps()
    .combine([
        'resources/assets/css/style.css',
        'resources/assets/css/app.scss',
        'node_modules/icheck/skins/square/blue.css'
    ], 'public/css/app.css')
    .combine([
        'resources/assets/css/admin_style.css'
    ], 'public/css/admin_app.css')
    .copy('node_modules/font-awesome/fonts/*.*', 'public/fonts/')
    .copy('node_modules/ionicons/dist/fonts/*.*', 'public/fonts/')
    .copy('node_modules/bootstrap/fonts/*.*', 'public/fonts/')
    .copy('node_modules/icheck/skins/square/blue.png', 'public/css')
    .copy('node_modules/icheck/skins/square/blue@2x.png', 'public/css');

if (mix.config.inProduction) {
    mix.version();
    mix.minify();
}

