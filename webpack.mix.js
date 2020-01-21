const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

// const VueLoaderPlugin = require('vue-loader/lib/plugin');

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
// import 'material-design-icons-iconfont/dist/material-design-icons.css'

//.copy('node_modules/material-design-icons-iconfont/css/material-icons.min.css', 'public/css/material-icons.min.css')

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/tinymce', 'public/js/tinymce')

    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .sourceMaps();





//    .exports = {
//    rules: [
//       {
//          test: /\.s(c|a)ss$/,
//          use: [
//             'vue-style-loader',
//             'css-loader',
//             {
//                loader: 'sass-loader',
//                // Requires sass-loader@^7.0.0
//                options: {
//                   implementation: require('sass'),
//                   fiber: require('fibers'),
//                   indentedSyntax: true // optional
//                },
//                // Requires sass-loader@^8.0.0
//                options: {
//                   implementation: require('sass'),
//                   sassOptions: {
//                      fiber: require('fibers'),
//                      indentedSyntax: true // optional
//                   },
//                },
//             },
//          ],
//       },
//    ],
// }
   //.styles(['//unpkg.com/element-ui@2.13.0/lib/theme-chalk/index.css'])
   // .options({
   //    // processCssUrls: false,

   //    // postCss: [tailwindcss('./tailwind.config.js')],
   // })
