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
    .js('resources/assets/js/categorias.js', 'public/js')
    .js('resources/assets/js/usuarios.js', 'public/js')
    .js('resources/assets/js/proyectos.js', 'public/js')
    .js('resources/assets/js/componentes.js', 'public/js')
    .js('resources/assets/js/documentos.js', 'public/js')
    .js('resources/assets/js/tipo-documento.js', 'public/js')
    .js('resources/assets/js/categorias-show.js', 'public/js')
    .js('resources/assets/js/invitaciones.js', 'public/js')
    .js('resources/assets/js/admin-proyectos.js', 'public/js')
    .js('resources/assets/js/evaluator-proyectos.js', 'public/js')
    .js('resources/assets/js/notificaciones.js', 'public/js')
    .js('resources/assets/js/items-codificacion.js', 'public/js')
    .js('resources/assets/js/scripts-codificacion.js', 'public/js')
    .js('resources/assets/js/modelacion.js', 'public/js')
    .js('resources/assets/js/tipo-nomenclatura.js', 'public/js')
    .js('resources/assets/js/nomenclaturas-show.js', 'public/js')
    .js('resources/assets/js/items-show.js', 'public/js')
    .js('resources/assets/js/archivo-sql.js', 'public/js')
    .js('resources/assets/js/evaluator-docs.js', 'public/js')
    .js('resources/assets/js/plataforma.js', 'public/js')
    .js('resources/assets/js/plataforma-student.js', 'public/js')
    .js('resources/assets//js/codificacion.js', 'public/js')