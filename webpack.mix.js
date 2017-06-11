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

/*
    Webpack Typescript Config
*/
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /.tsx?$/,
                loader: 'ts-loader',
                exclude: /node_modules/,
                options: {
                    appendTsSuffixTo: [/\.vue$/]
                }
            }
        ]
    },
    resolve: {
        extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx']
    }
})
.js('resources/assets/js/bootstrap.js', 'public/js')
.js('resources/assets/js/app.tsx', 'public/js')
.sass('resources/assets/sass/app.scss')
