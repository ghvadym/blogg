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
    .sass('assets/scss/app.scss', 'assets/css')
    .options({
        processCssUrls: false,
        postCss: [
            require('autoprefixer')({
                overrideBrowserslist: ['last 2 versions'],
                cascade: false
            })
        ]
    })
    .sourceMaps(true, 'source-map');
