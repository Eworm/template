const mix = require('laravel-mix');
const path = require('path');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');

mix.options({
        terser: {
            extractComments: true
        },
        processCssUrls: false
    })
    .setPublicPath('/')
    .setResourceRoot('/')
    .sass('sass/style.scss', path.resolve('/'))
    .combine([
        'node_modules/vanilla-lazyload/dist/lazyload.js',
        'node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.js',
        'js-src/modules/template.lazyload.js',
        'js-src/modules/template.autocomplete.js',
        'js-src/modules/template.googlemaps.js',
        'js-src/modules/template.mq.js',
        'js-src/modules/template.mq-palm.js',
        'js-src/modules/template.mq-lap.js',
        'js-src/modules/template.mq-desk.js',
        'js-src/modules/template.mq-wall.js',
        'js-src/modules/template.mq-cinema.js',
        'js-src/base/template.init.js'
    ], path.resolve('js/functions.min.js'))
    .combine([
        'js-src/vendor/LABjs/LAB.js',
        'js-src/base/lab-loader.js'
    ], path.resolve('js/lab.min.js'))
    .webpackConfig({
        plugins: [
            new SVGSpritemapPlugin(
                'images-src/sprite/**/*.svg',
                {
                    output: {
                        filename:
                            'images/sprite.svg',
                        chunk: {
                            name:
                                'js/spritemap',
                        }
                    }
                }
            )
        ]
    })
    .version()
