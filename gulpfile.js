var gulp = require('gulp'),
    // Get packages from package.json
    plugins = require("gulp-load-plugins")(),
    // Livereload stuff
    lr = require('tiny-lr'),
    server = lr();
    

// Set source paths
var src_paths = {
    compass: 'sass/**/*.scss',
    autoprefixer: '*.css',
    svgmin: 'images-src/*.svg',
    svg2png: 'images-src/*.svg',
    imagemin: 'images/portfolio/*.*',
    bookmarks: 'images-src/root/*.png',
    uglify: ['bower_components/picturefill/external/matchmedia.js',
                'bower_components/hideShowPassword/hideShowPassword.js',
                'bower_components/picturefill/picturefill.js',
                'bower_components/parsleyjs/dist/parsley.js',
                'bower_components/on-media-query/js/onmediaquery.js',
                'js-src/functions.js'],
    yepnope: ['bower_components/yepnope/yepnope.1.5.4-min.js',
                'js-src/yepnope-loader.js']
};


// Set destination paths
var dest_paths = {
    compass: '.',
    svgmin: 'images',
    svg2png: 'images',
    imagemin: 'images',
    uglify: 'js',
    bookmarks: '_put_in_root',
    yepnope: 'js'
};


// Compass
gulp.task('compass', function() {
    gulp.src(src_paths.compass)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError("Error: <%= error.message %>")}))
        
        .pipe(plugins.compass({
            config_file: 'config.rb',
            sourcemap: false,
            //debug: true,
            css: dest_paths.compass,
            sass: 'sass',
            import_path: 'bower_components/normalize.scss'
        }))
        
        .pipe(plugins.autoprefixer("last 2 versions", "> 1%", "ie 8"))
		.pipe(gulp.dest('.'))
        
        .pipe(plugins.livereload(server))
        .pipe(plugins.notify({ message: 'Compass complete' }))
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


// Create all IOS & Windows phone images
gulp.task('bookmarks', function () {

    gulp.src(src_paths.bookmarks)
        .pipe(plugins.imageResize({ width: 129, width: 129, quality: .9, imageMagick: true }))
        .pipe(plugins.rename("apple-touch-icon-precomposed.png"))
        .pipe(gulp.dest(dest_paths.bookmarks))
        
    gulp.src(src_paths.bookmarks)
        .pipe(plugins.imageResize({ width: 129, width: 129, quality: .9, imageMagick: true }))
        .pipe(plugins.rename("apple-touch-icon.png"))
        .pipe(gulp.dest(dest_paths.bookmarks))
    
    gulp.src(src_paths.bookmarks)
        .pipe(plugins.imageResize({ width: 144, width: 144, quality: .9, imageMagick: true }))
        .pipe(plugins.rename("windows8-tile.png"))
        .pipe(gulp.dest(dest_paths.bookmarks))
    
    .pipe(plugins.notify({ message: 'Bookmarks complete' }))
        
});


// SCSS lint
gulp.task('lint', function() {
    gulp.src(src_paths.compass)
        .pipe(plugins.scssLint())
});


// Watch
gulp.task('watch', function() {
    server.listen(35729, function(err) {
    	gulp.watch(src_paths.compass, ['compass']);
    	gulp.watch([src_paths.uglify, src_paths.yepnope], ['uglify']);
    	gulp.watch(src_paths.svgmin, ['svgmin']);
    	gulp.watch(src_paths.svg2png, ['svg2png']);
        gulp.watch(src_paths.bookmarks, ['bookmarks']);
    })
});


// Default
gulp.task('default', ['watch']);