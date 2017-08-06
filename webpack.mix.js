let mix = require('laravel-mix')
let path = require('path')

mix.webpackConfig({
  resolve: {
    alias: {
      'bootstrap-sass': path.resolve(__dirname, 'node_modules/bootstrap-sass'),
      sass: path.resolve(__dirname, 'resources/assets/sass/')
    }
  }
})
mix.js('resources/assets/js/main.js', 'public/js')
   .sass('resources/assets/sass/app.sass', 'public/css')

mix.browserSync('charts.app')
