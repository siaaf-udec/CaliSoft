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

mix
    .js('resources/assets/js/bootstrap.js', 'public/js')
    .js('resources/assets/js/semilleros.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/categorias.js', 'public/js')
    .js('resources/assets/js/usuarios.js', 'public/js')
    .js('resources/assets/js/proyectos.js', 'public/js')
    .js('resources/assets/js/componentes.js', 'public/js')
