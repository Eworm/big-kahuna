const mix = require('laravel-mix');
require('dotenv').config();

// In an .env file, define the path to the Statamic site you want this addon to be copied to.
// eg. STATAMIC_PATH=/users/bob/sites/statamic
const statamic = process.env.STATAMIC_PATH;

// mix.copyDirectory('BigKahuna', `${statamic}/site/addons/BigKahuna`);

mix.js('BigKahuna/resources/assets/src/js/scripts.js', 'BigKahuna/resources/assets/js');
