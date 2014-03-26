var gulp = require('gulp');

var compass = require('gulp-compass'),
    plumber = require('gulp-plumber'),
    sass = require('gulp-sass');
    notify = require('gulp-notify'),
    svg2png = require('gulp-svg2png'),
    svgmin = require('gulp-svgmin'),
    concat = require('gulp-concat'),
    stripDebug = require('gulp-strip-debug'),
    uglify = require('gulp-uglify'),
    livereload = require('gulp-livereload');
    lr = require('tiny-lr'),
    server = lr();


var paths = {
    compass: './sass/**/*.scss',
    svgmin: './img-src/*.svg',
    svg2png: './img-src/*.svg',
    scripts: ['./bower_components/picturefill/external/matchmedia.js',
                './bower_components/picturefill/picturefill.js',
                './bower_components/on-media-query/js/onmediaquery.js',
                './js-src/functions.js']
};


// Compass
gulp.task('compass', function() {
    gulp.src(paths.compass)
        .pipe(compass({
            config_file: './config.rb',
            css: '.',
            sass: 'sass',
            image: 'img',
            font: 'fonts'
        }))
        .pipe(gulp.dest('.'))
        .pipe(livereload(server))
        .pipe(notify({ message: 'Sass complete' }))
});


// SVG optim
gulp.task('svgmin', function() {
    gulp.src(paths.svgmin)
        .pipe(svgmin())
        .pipe(gulp.dest('./img'))
        .pipe(livereload(server))
        .pipe(notify({ message: 'Svgoptim complete' }))
});


// SVG 2 png
gulp.task('svg2png', function () {
    gulp.src(paths.svg2png)
        .pipe(svg2png())
        .pipe(gulp.dest('./img'))
        .pipe(livereload(server))
        .pipe(notify({ message: 'Svg2png complete' }))
});


// Uglify
gulp.task('scripts', function() {
    gulp.src(paths.scripts)
        .pipe(concat('functions.min.js'))
        .pipe(stripDebug())
        .pipe(uglify())
        .pipe(gulp.dest('./js'))
        .pipe(livereload(server))
        .pipe(notify({ message: 'Uglify complete' }));
});


// Watch
gulp.task('watch', function() {
    server.listen(35729, function(err) {
		if (err) {
			return console.log(err)
		}
    	gulp.watch(paths.compass, ['compass']);
    	gulp.watch(paths.scripts, ['scripts']);
    	gulp.watch(paths.svgmin, ['svgmin']);
    	gulp.watch(paths.svg2png, ['svg2png']);
    })
});


// Default
gulp.task('default', ['compass', 'scripts', 'svgmin', 'svg2png', 'watch']);