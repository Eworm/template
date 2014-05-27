var gulp = require('gulp');


// Get packages from package.json
var plugins = require("gulp-load-plugins")();


// Livereload stuff
lr = require('tiny-lr'),
server = lr();


// Set standard src_paths
var src_paths = {
    compass: './sass/**/*.scss',
    autoprefixer: '*.css',
    svgmin: './img-src/*.svg',
    svg2png: './img-src/*.svg',
    imagemin: './img/*.*',
    uglify: ['./bower_components/picturefill/external/matchmedia.js',
                './bower_components/hideShowPassword/hideShowPassword.js',
                './bower_components/picturefill/picturefill.js',
                './bower_components/on-media-query/js/onmediaquery.js',
                './js-src/functions.js'],
    yepnope: ['./bower_components/yepnope/yepnope.1.5.4-min.js',
                './js-src/yepnope-loader.js']
};

var dest_paths = {
    compass: '.',
    svgmin: './img',
    svg2png: './img',
    imagemin: './img',
    uglify: './js',
    yepnope: './js'
};


// Compass
gulp.task('compass', function() {
    gulp.src(src_paths.compass)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError("Error: <%= error.message %>")}))
        
        .pipe(plugins.compass({
            config_file: './config.rb',
            project: '.',
            css: dest_paths.compass,
            image: 'img',
            font: 'fonts',
            import_path: 'bower_components',
            sourcemap: true
        }))
        
        .pipe(plugins.autoprefixer("last 2 versions", "> 1%", "ie 8"))
		.pipe(gulp.dest('.'))
        
        .pipe(plugins.livereload(server))
        .pipe(plugins.notify({ message: 'Sass complete' }))
});


// SVG optim
gulp.task('svgmin', function() {
    gulp.src(src_paths.svgmin)
        .pipe(plugins.svgmin())
        .pipe(gulp.dest(dest_paths.svgmin))
        
        .pipe(plugins.livereload(server))
        .pipe(plugins.notify({ message: 'Svgoptim complete' }))
});


// SVG 2 png
gulp.task('svg2png', function () {
    gulp.src(src_paths.svg2png)
        .pipe(plugins.svg2png())
        .pipe(gulp.dest(dest_paths.svg2png))
        
        .pipe(plugins.livereload(server))
        .pipe(plugins.notify({ message: 'Svg2png complete' }))
});


// Imagemin - run just before uploading
gulp.task('imagemin', function () {
    gulp.src(src_paths.imagemin)
        .pipe(plugins.imagemin())
        .pipe(gulp.dest(dest_paths.imagemin))
        .pipe(plugins.notify({ message: 'Imagemin complete' }))
});


// Uglify
gulp.task('uglify', function() {
    
    gulp.src(src_paths.uglify)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError("Error: <%= error.message %>")}))
    
        .pipe(plugins.concat('functions.min.js'))
        // Strip console and debugger statements from JavaScript code
        .pipe(plugins.stripDebug())
        .pipe(plugins.uglify())
        .pipe(gulp.dest(dest_paths.uglify))
        
        .pipe(plugins.livereload(server))
        .pipe(plugins.notify({ message: 'Uglify complete' }))
        
    gulp.src(src_paths.yepnope)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError("Error: <%= error.message %>")}))
    
        .pipe(plugins.concat('yepnope.min.js'))
        .pipe(plugins.stripDebug())
        .pipe(plugins.uglify())
        .pipe(gulp.dest(dest_paths.uglify))
        
        .pipe(plugins.livereload(server))
        .pipe(plugins.notify({ message: 'Uglify complete' }))
});


// SCSS lint
gulp.task('lint', function() {
    gulp.src(src_paths.compass)
        .pipe(plugins.scsslint())
        .pipe(plugins.scsslint.reporter());
});


// Watch
gulp.task('watch', function() {
    server.listen(35729, function(err) {
    	gulp.watch(src_paths.compass, ['compass']);
    	gulp.watch([src_paths.uglify, src_paths.yepnope], ['uglify']);
    	gulp.watch(src_paths.svgmin, ['svgmin']);
    	gulp.watch(src_paths.svg2png, ['svg2png']);
    })
});


// Default
gulp.task('default', ['watch']);