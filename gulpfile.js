var gulp = require('gulp'),
    elixir = require('laravel-elixir'),
    plugins = require('gulp-load-plugins')();

require('laravel-elixir-vue');

elixir(function(mix) {
    mix.webpack([
        './BigKahuna/resources/assets/js/main.js'
    ], './BigKahuna/resources/assets/js/scripts.js');
});
