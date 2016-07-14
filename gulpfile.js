var gulp = require('gulp'),
    // Get packages from package.json
    plugins = require('gulp-load-plugins')();

// Set source paths
var src_paths = {
    css: 'sass/**/*.scss',
    autoprefixer: '*.css',
    sprite: 'images-src/sprite/**/*.svg',
    functions: ['bower_components/parsleyjs/dist/parsley.js',
                'bower_components/hoverintent/jquery.hoverIntent.js',
                'bower_components/matchMedia/matchMedia.js',
                'bower_components/matchMedia/matchMedia.addListener.js',
                'bower_components/blazy/blazy.js',
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
        
        .pipe(plugins.uncss({
            html: ['index.html',
                'posts/**/*.html',
                'http://example.com'
            ],
            options: {
                ignore: [
                    '.collapsing',  // collapsing
                    /\.fade/,       // fade
                    /\.close/,      // .close class
                    /\.collapse/,   // .collapse prefixed classes
                    /\.collapsed/,  // .collapse prefixed classes
                    /\.modal/,      // .modal prefixed classes
                    /\.in/,         // .in classes
                    /\.js\-/,       // .js- prefixed classes
                    /\.has\-/,      // .has- prefixed classes
                    /\.error/,      // .error prefixed classes
                    /\.valid/,      // .valid prefixed classes
                    /\.js/,         // .js prefixed classes
                    /\.is\-/,       // .is- prefixed classes
                    /\.cycle\-/,    // .cycle- prefixed classes
                    /\.slider/,     // all slider components, including dynamic pager
                    /\.chosen/,     // all chosen selects
                    /\.affix/,      // all affix selects
                    /placeholder/,  // All placeholder attributes
                    /\.active/,     // All of .active
                    /\.touch/,      // All of .touch
                    /\.no-/,        // All of .no-
                    /\-webkit-/,    // All webkit vendor styles
                ],
            }
        }))
        
        .pipe(plugins.cssnano({
            zindex: false,
            autoprefixer: false
        }))
		.pipe(gulp.dest(dest_paths.css))
		
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Css complete!' }));
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
        .pipe(plugins.notify({ message: 'Uglify complete!' }))
        
    gulp.src(src_paths.labjs)
    
        .pipe(plugins.plumber({errorHandler: plugins.notify.onError('Error: <%= error.message %>')}))
    
        .pipe(plugins.concat('lab.min.js'))
        .pipe(plugins.uglify({
            compress: false
        }))
        .pipe(gulp.dest(dest_paths.javascript))
        
        .pipe(plugins.livereload())
        .pipe(plugins.notify({ message: 'Uglify complete!' }))
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


// Watch
gulp.task('watch', function(ev) {
    plugins.livereload.listen();
	gulp.watch(src_paths.css, ['css']);
	gulp.watch(src_paths.javascript, ['uglify']);
    gulp.watch(src_paths.sprite, ['sprite']);
});


// Default
gulp.task('default', ['watch']);
