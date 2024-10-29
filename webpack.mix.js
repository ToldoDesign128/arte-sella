// webpack.mix.js
let mix = require('laravel-mix');

mix.sass('assets/scss/style.scss', 'style.css');

mix.combine(['assets/js/animation.js', 'assets/js/interaction.js'], 'scripts.js')
  .minify('scripts.js');

mix.webpackConfig({
  watchOptions: {
    ignored: /node_modules/
  }
});