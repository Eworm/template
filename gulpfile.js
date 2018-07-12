var gulp                = require('gulp'),
    plugins             = require('gulp-load-plugins')(),
    neat                = require('bourbon-neat').includePaths,
    critical            = require('critical').stream;



// Source paths
var src_paths = {
    css:                'sass/**/*.scss',
    autoprefixer:       '*.css',
    sprite:             'images-src/sprite/**/*.svg',
    labjs:              ['node_modules/labjs/LAB.min.js',
                            'js-src/lab-loader.js'
                        ],
    javascript:         'js-src/**/*.*'
};



// Destination paths
var dest_paths = {
    css:                '.',
    images:             'images',
    javascript:         'js'
};



// CSS using SASS
gulp.task('css', function() {
    gulp.src(src_paths.css)

        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError('Error: <%= error.message %>')
        }))

        .pipe(plugins.sass({
            outputStyle: 'compressed',
            includePaths: ['node_modules/normalize-scss/sass/normalize', neat]
        }))

        .pipe(plugins.autoprefixer({
            browsers: ['last 2 versions', 'ie 10'],
            cascade: false
        }))

        .pipe(plugins.cleanCss({}))

        .pipe(gulp.dest(dest_paths.css))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({
            message: 'Css complete!'
        }))
});



// Javascript
gulp.task('javascript', function() {

    gulp.src([
            'node_modules/parsleyjs/dist/parsley.js',
            'node_modules/parsleyjs/dist/i18n/nl.js',
            'node_modules/blazy/blazy.js',
            'node_modules/hyperform/hyperform.js',
            'node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.js'
            'js-src/modules/template.blazy.js',
            'js-src/modules/template.autocomplete.js',
            'js-src/modules/template.mq.js',
            'js-src/modules/template.mq-palm.js',
            'js-src/modules/template.mq-lap.js',
            'js-src/modules/template.mq-desk.js',
            'js-src/modules/template.mq-wall.js',
            'js-src/modules/template.mq-cinema.js',
            'js-src/template.init.js'
        ])
        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError('Error: <%= error.message %>')
        }))
        .pipe(plugins.concat('wedeka.min.js'))
        .pipe(plugins.uglify()
        .pipe(gulp.dest(dest_paths.javascript))

        .pipe(plugins.notify({
            message: 'Functions minified complete!'
        }))

    gulp.src(src_paths.labjs)

        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError('Error: <%= error.message %>')
        }))

        .pipe(plugins.concat('lab.min.js'))
        .pipe(plugins.uglify()
        .pipe(gulp.dest(dest_paths.javascript))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({
            message: 'Labloader minified complete!'
        }))
});



// SVG sprite
gulp.task('sprite', function() {

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

});



// SCSS lint
gulp.task('lint', function() {
    return gulp.src(src_paths.css)
        .pipe(plugins.scssLint())
});



// Critical css
// More info & options: https://github.com/addyosmani/critical
gulp.task('critical', function() {
    return gulp.src('style.css')
        .pipe(critical({
            inline: false,
            base: '.',
            src: 'http://template.dev/',
            css: 'style.css',
            dest: 'style-critical.css',
            minify: true,
            extract: false,
            dimensions: [{
                height: 320,
                width: 500
            }, {
                height: 900,
                width: 1300
            }],
            include: ['.breadcrumbs',
                '.breadcrumbs > li',
                '.breadcrumbs a',
                '.page_item',
                '.pagemenu',
                '.pagemenu ul',
                '.pagemenu li',
                '.pagemenu a',
                '.symbols',
                '.grid-item',
                '.container'
            ]
        }))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({
            message: 'Critical css complete!'
        }))
});



// Watch
gulp.task('watch', function(ev) {
    plugins.livereload.listen();
    gulp.watch(src_paths.css, ['css']);
    gulp.watch(src_paths.javascript, ['javascript']);
    gulp.watch(src_paths.sprite, ['sprite']);
});



// Default
gulp.task('default', ['watch']);
