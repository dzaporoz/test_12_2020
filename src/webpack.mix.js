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

// Theme resources
mix.copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js')
    .copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js')
    .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js')
    .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css')
    .copyDirectory('node_modules/admin-lte/plugins/fontawesome-free/webfonts', 'public/webfonts');

// Datatables
mix.copy('node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css', 'public/css')
    .combine([
        'node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js',
        'node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
        'node_modules/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js',
        'node_modules/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
        'node_modules/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js',
    ], 'public/js/datatables.js');
