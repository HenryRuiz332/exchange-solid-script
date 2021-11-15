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

mix.js('dashboard/admin.js', 'public/admin/dashboard/js/')
    .js('dashboard/auth/login.js', 'public/admin/dashboard/js/')
    .js('dashboard/auth/register.js', 'public/admin/dashboard/js/')
    .js('resources/js/app.js', 'public/frontend/js/')
    .vue()
    .sass('dashboard/components/sass/admin.scss', 'public/admin/dashboard/css');
