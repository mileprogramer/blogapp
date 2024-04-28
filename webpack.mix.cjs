const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/scss/style.scss', 'public/css');

mix.options({
   processCssUrls: false
});