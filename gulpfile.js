var gulp = require('gulp'),
    // Get packages from package.json
    plugins = require('gulp-load-plugins')();

// Set source paths
var src_paths = {
    css: 'sass/**/*.scss',
    autoprefixer: '*.css',
    sprites: 'images-src/sprites/**/*.svg',
    functions: ['bower_components/picturefill/external/matchmedia.js',
                'bower_components/hideShowPassword/hideShowPassword.js',
                'bower_components/picturefill/picturefill.js',
                'bower_components/parsleyjs/dist/parsley.js',
                'bower_components/hoverintent/jquery.hoverIntent.js',
                'bower_components/matchMedia/matchMedia.js',
                'bower_components/matchMedia/matchMedia.addListener.js',
                'js-src/functions.js'],
    labjs: ['bower_components/labjs/LAB.min.js',
                'js-src/lab-loader.js'],
    javascript: 'js-src/*.*'
};


// Set destination paths
var dest_paths = {
    css: '.',
    images: 'images',
    javascript: 'js'
};


// CSS sassing
gulp.task('css', function() {
    gulp.src(src_paths.css)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
        
        .pipe(plugins.sass({ outputStyle: 'compressed', includePaths: 'bower_components/normalize.scss'}))
        .pipe(plugins.autoprefixer({ browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4'], cascade: false }))
        .pipe(plugins.minifyCss())
		.pipe(gulp.dest(dest_paths.css))
		
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Css complete' }));
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
        .pipe(plugins.svgSprite({
            "mode": {
                "symbol": {
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
    gulp.src(src_paths.sass)
        .pipe(plugins.scssLint())
});


// Watch
gulp.task('watch', function(ev) {
    plugins.livereload.listen();
	gulp.watch(src_paths.sass, ['css']);
	gulp.watch(src_paths.javascript, ['uglify']);
    gulp.watch(src_paths.sprites, ['sprites']);
});


// Default
gulp.task('default', ['watch']);
