const gulp = require('gulp'),
    plugins = require('gulp-load-plugins')(),
    livereload = require('gulp-livereload');


// Source paths
const src_paths = {
    css: 'sass/**/*.scss',
    autoprefixer: '*.css',
    sprite: 'images-src/sprite/**/*.svg',
    labjs: ['node_modules/labjs/LAB.min.js',
        'js-src/base/lab-loader.js'
    ],
    javascript: 'js-src/**/*.*'
};


// Destination paths
const dest_paths = {
    css: '.',
    images: 'images',
    javascript: 'js'
};


// CSS using SASS
function css(done) {
    gulp.src(src_paths.css)

        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError('Error: <%= error.message %>')
        }))

        .pipe(plugins.sass({
            outputStyle: 'compressed',
            includePaths: ['node_modules/normalize-scss/sass/normalize']
        }))

        .pipe(plugins.autoprefixer({
            cascade: false
        }))

        .pipe(plugins.cleanCss({}))

        .pipe(gulp.dest(dest_paths.css))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({
            message: 'Css complete!'
        }))

    done();
};


// Javascript
function javascript(done) {

    gulp.src([
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
        ])
        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError('Error: <%= error.message %>')
        }))
        .pipe(plugins.concat('functions.min.js'))
        .pipe(plugins.terser())
        .pipe(gulp.dest(dest_paths.javascript))

        .pipe(plugins.notify({
            message: 'Functions minified complete!'
        }))

    gulp.src(src_paths.labjs)

        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError('Error: <%= error.message %>')
        }))

        .pipe(plugins.concat('lab.min.js'))
        .pipe(plugins.terser())
        .pipe(gulp.dest(dest_paths.javascript))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({
            message: 'Labloader minified complete!'
        }))

    done();
};


// SVG sprite
function sprite(done) {

    return gulp.src(src_paths.sprite)

        .pipe(plugins.plumber())
        .pipe(plugins.svgSprite({
            "svg": {
                "xmlDeclaration": false,
                "rootAttributes": {
                    "class": "symbols"
                }
            },
            "mode": {
                "symbol": {
                    "spacing": {
                        "padding": 10
                    },
                    "dest": "./",
                    "layout": "vertical",
                    "sprite": "sprite.svg",
                    "bust": false
                }
            }
        })).on('error', function(error) {
            /* Do some awesome error handling ... */
        })
        .pipe(gulp.dest(dest_paths.images))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({
            message: 'Sprite complete!'
        }))

    done();

};


// SCSS lint
function lint(done) {
    return gulp.src(src_paths.css)
        .pipe(plugins.scssLint())

    done();
};


// Watch files
function watchFiles() {
    livereload.listen();
    gulp.watch(src_paths.css, css);
    gulp.watch(src_paths.javascript, javascript);
    gulp.watch(src_paths.sprite, sprite);
}


// Export tasks
exports.lint = lint;
exports.css = css;
exports.javascript = javascript;
exports.sprite = sprite;
exports.default = watchFiles;
