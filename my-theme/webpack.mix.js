const mix = require("laravel-mix");

require('laravel-mix-webp')
require('laravel-mix-imagemin')


mix.ImageWebp({
    from: 'resources/images',
    to: 'dist/images',
  })

mix.js("resources/js/app.js", "dist/")
mix.sass("resources/scss/app.scss", "dist/");
// mix.copyDirectory('resources/fonts', 'dist/fonts');
mix.options({
  processCssUrls: false,
})

mix.browserSync({
  proxy: "http://portfolio/",
  port: 8001,
  files: ["./**/*.php", "./dist/**/*.*"],
});