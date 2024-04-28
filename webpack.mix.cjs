const mix = require('laravel-mix');

const fs = require("fs");

fs.readdirSync("resources/scss/").forEach(fileName => 
   mix.sass(`resources/scss/${fileName}`, "public/css"));

fs.readdirSync("resources/js/").forEach(fileName => 
   mix.js(`resources/js/${fileName}`, "public/js"));

mix.options({
   processCssUrls: false
});