var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.styles([
        'bootstrap.min.css',
        'animate.css',
        'font-awesome.min.css',
        'main.css',
        'prettyPhoto.css',
        'price-range.css',
        'responsive.css'
    ], 'public/css/all.css'
    );
    mix.scripts([
        'jquery.js',
        'bootstrap.min.js',
        'contact.js',
        'gmaps.js',
        'html5shiv.js',
        'jquery.prettyPhoto.js',
        'jquery.scrollUp.min.js',
        'main.js',
        'price-range.js'
    ],
       'public/js/all.js'

    );

    //mix.sass('app.scss');
    
    mix.version(['css/all.css','js/all.js']);
});
