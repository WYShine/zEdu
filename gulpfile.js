var elixir = require('laravel-elixir'),
    path = require('path');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

function bowerPath(assetPath) {
    return path.resolve('resources/assets/bower_components', assetPath);
}

elixir(function(mix) {
    mix.less('app.less')
        .copy(bowerPath('jquery/dist/jquery.js'), 'public/js/jquery.js')
        .copy(bowerPath('angular/angular.js'), 'public/js/angular.js')
        .scripts(['**/*.js'], 'public/js/app.js');
});
