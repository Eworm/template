var gulp = require('gulp'),
    // Get packages from package.json
    plugins = require('gulp-load-plugins')();

// Set source paths
var src_paths = {
    compass: 'sass/**/*.scss',
    autoprefixer: '*.css',
    imagemin: 'images/portfolio/*.*',
    bookmarks: 'images-src/root/*.png',
    sprites: 'images-src/sprites/**/*.svg',
    functions: ['bower_components/picturefill/external/matchmedia.js',
                'bower_components/hideShowPassword/hideShowPassword.js',
                'bower_components/picturefill/picturefill.js',
                'bower_components/parsleyjs/dist/parsley.js',
                'bower_components/on-media-query/js/onmediaquery.js',
                'bower_components/hoverintent/jquery.hoverIntent.js',
                'js-src/functions.js'],
    labjs: ['bower_components/labjs/LAB.min.js',
                'js-src/lab-loader.js'],
    uglify: 'js-src/*.*'
};


// Set destination paths
var dest_paths = {
    compass: '.',
    images: 'images',
    imagemin: 'images',
    uglify: 'js',
    bookmarks: '_put_in_root',
    labjs: 'js'
};


// Compass
gulp.task('compass', function() {
    gulp.src(src_paths.compass)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
        
        .pipe(plugins.compass({
            config_file: 'config.rb',
            sourcemap: false,
            //debug: true,
            css: dest_paths.compass,
            sass: 'sass',
            import_path: 'bower_components/normalize.scss'
        }))
        
        .pipe(plugins.autoprefixer('last 2 versions', '> 1%', 'ie 9'))
		.pipe(gulp.dest(dest_paths.compass))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Compass complete' }))
});


// Uglify
gulp.task('uglify', function() {
    
    gulp.src(src_paths.functions)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
    
        .pipe(plugins.concat('functions.min.js'))
        // .pipe(plugins.stripDebug())
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.uglify))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Uglify complete' }))
        
    gulp.src(src_paths.labjs)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
    
        .pipe(plugins.concat('lab.min.js'))
        // .pipe(plugins.stripDebug())
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.uglify))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Uglify complete' }))
});


// Create all IOS & Windows phone images
gulp.task('bookmarks', function () {

    gulp.src(src_paths.bookmarks)
        .pipe(plugins.imageResize({ width: 129, width: 129, quality: .9, imageMagick: true }))
        .pipe(plugins.rename('apple-touch-icon-precomposed.png'))
        .pipe(gulp.dest(dest_paths.bookmarks))
        
    gulp.src(src_paths.bookmarks)
        .pipe(plugins.imageResize({ width: 129, width: 129, quality: .9, imageMagick: true }))
        .pipe(plugins.rename('apple-touch-icon.png'))
        .pipe(gulp.dest(dest_paths.bookmarks))
    
    gulp.src(src_paths.bookmarks)
        .pipe(plugins.imageResize({ width: 144, width: 144, quality: .9, imageMagick: true }))
        .pipe(plugins.rename('windows8-tile.png'))
        .pipe(gulp.dest(dest_paths.bookmarks))
    
    .pipe(plugins.notify({ message: 'Bookmarks complete' }))
        
});


// SVG sprites
gulp.task('sprites', function () {
    
    return gulp.src(src_paths.svgsprites)
    
            .pipe(plugins.svgSprites({cssFile: '../sass/sprites/_sprites.scss',
                    svgPath: 'images/%f',
                    pngPath: 'images/%f',
                    layout: 'vertical',
                    templates: {
                        css: require('fs').readFileSync('./dustjs/sprite-template.css', 'utf-8')
                    }
            }))
            .pipe(gulp.dest(dest_paths.images))
            .pipe(plugins.filter('**/*.svg'))
            .pipe(gulp.dest(dest_paths.images))
            
            .pipe(plugins.livereload())
            .pipe(plugins.notify({ message: 'Svg sprites optim complete' }))
            
});


// SCSS lint
gulp.task('lint', function() {
    gulp.src(src_paths.compass)
        .pipe(plugins.scssLint())
});


// Watch
gulp.task('watch', function(ev) {
    plugins.livereload.listen();
	gulp.watch(src_paths.compass, ['compass']);
	gulp.watch([src_paths.uglify, src_paths.labjs], ['uglify']);
    gulp.watch(src_paths.bookmarks, ['bookmarks']);
    gulp.watch(src_paths.sprites, ['sprites']);
});


// Default
gulp.task('default', ['watch']);
