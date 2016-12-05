var gulp = require('gulp'),
    // Get packages from package.json
    plugins = require('gulp-load-plugins')(),
    critical = require('critical').stream;



// Source paths
var src_paths = {
    css: 'sass/**/*.scss',
    autoprefixer: '*.css',
    sprite: 'images-src/sprite/**/*.svg',
    scripts: ['bower_components/parsleyjs/dist/parsley.js',
                'bower_components/hoverintent/jquery.hoverIntent.js',
                'bower_components/blazy/blazy.js',
                'js-src/functions.js'],
    labjs: ['bower_components/labjs/LAB.min.js',
                'js-src/lab-loader.js'],
    javascript: 'js-src/*.*'
};



// Destination paths
var dest_paths = {
    css: '.',
    images: 'images',
    javascript: 'js'
};



// CSS using SASS
gulp.task('css', function() {
    gulp.src(src_paths.css)

        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))

        .pipe(plugins.sass({
            outputStyle: 'compressed',
            includePaths: 'bower_components/normalize-scss/sass/normalize'
        }))
        
        .pipe(plugins.autoprefixer({
            browsers: ['last 2 versions', 'ie 10'],
            cascade: false
        }))

        .pipe(plugins.cssnano({
            zindex: false,
            autoprefixer: false
        }))
        
		.pipe(gulp.dest(dest_paths.css))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Css complete!' }))
});



// Javascript
gulp.task('javascript', function() {

    gulp.src(src_paths.scripts)

        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))

        .pipe(plugins.concat('functions.min.js'))
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.javascript))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'javascript complete!' }))

    gulp.src(src_paths.labjs)

        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))

        .pipe(plugins.concat('lab.min.js'))
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.javascript))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'javascript complete!' }))
});



// SVG sprite
gulp.task('sprite', function () {

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
        })).on('error', function(error){
            /* Do some awesome error handling ... */
        })
        .pipe(gulp.dest(dest_paths.images))

        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Sprite complete!' }))

});



// SCSS lint
gulp.task('lint', function() {
    gulp.src(src_paths.sass)
        .pipe(plugins.scssLint())
});



// Critical css
// More info & options: https://github.com/addyosmani/critical
gulp.task('critical', function () {
    return gulp.src('style.css')
        .pipe(critical({
            inline: false,
            base: '.',
            src: 'http://template.dev/',
            css: 'style.css',
            dest: 'style-critical.css',
            minify: true,
            extract: false,
            width: 1300,
            height: 900,
            include: ['.breadcrumbs',
                        '.breadcrumbs > li',
                        '.breadcrumbs a',
                        '.page_item',
                        '.pagemenu',
                        '.pagemenu ul',
                        '.pagemenu li',
                        '.pagemenu a',
                        '.symbols',
                        '.row',
                        '.col',
                        '.divider']
        }))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Critical css complete!' }))
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
