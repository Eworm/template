var gulp = require('gulp'),
    // Get packages from package.json
    plugins = require('gulp-load-plugins')();

// Set source paths
var src_paths = {
    compass: 'sass/**/*.scss',
    autoprefixer: '*.css',
    bookmarks: 'images-src/root/*.png',
    sprites: 'images-src/sprites/**/*.svg',
    functions: ['bower_components/picturefill/external/matchmedia.js',
                'bower_components/hideShowPassword/hideShowPassword.js',
                'bower_components/picturefill/picturefill.js',
                'bower_components/parsleyjs/dist/parsley.js',
                'bower_components/hoverintent/jquery.hoverIntent.js',
                'js-src/functions.js'],
    labjs: ['bower_components/labjs/LAB.min.js',
                'js-src/lab-loader.js'],
    javascript: 'js-src/*.*'
};


// Set destination paths
var dest_paths = {
    compass: '.',
    images: 'images',
    bookmarks: '_put_in_root',
    javascript: 'js'
};


// Compass
gulp.task('compass', function() {
    gulp.src(src_paths.compass)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
        
        .pipe(plugins.compass({
            config_file: 'config.rb',
            sourcemap: false,
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
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.javascript))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Uglify complete' }))
        
    gulp.src(src_paths.labjs)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
    
        .pipe(plugins.concat('lab.min.js'))
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.javascript))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Uglify complete' }))
});


// SVG sprites
gulp.task('sprites', function () {
    
    return gulp.src(src_paths.sprites)
    
        .pipe(plugins.plumber())
        .pipe(plugins.svgo())
        .pipe(plugins.svgSprite({
            "mode": {
                "css": {
                    "spacing": {
                        "padding": 10
                    },
                    "dest": "./",
                    "layout": "vertical",
                    "sprite": "sprite.svg",
                    "bust": false,
                    "render": {
                        "scss": {
                            "dest": "../sass/sprites/_sprites.scss",
                            "template": "build/tpl/sprite-template.scss"
                        }
                    }
                }
            }
        })).on('error', function(error){
            /* Do some awesome error handling ... */
        })
        .pipe(gulp.dest(dest_paths.images))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Svg sprite complete' }))
            
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
	gulp.watch(src_paths.javascript, ['uglify']);
    gulp.watch(src_paths.sprites, ['sprites']);
});


// Default
gulp.task('default', ['watch']);
