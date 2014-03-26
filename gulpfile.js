var gulp = require('gulp');


// Get packages from package.json
var tasks = require("gulp-load-tasks")();


// Livereload stuff
lr = require('tiny-lr'),
server = lr();


// Set standard paths
var paths = {
    compass: './sass/**/*.scss',
    autoprefixer: '*.css',
    svgmin: './img-src/*.svg',
    svg2png: './img-src/*.svg',
    uglify: ['./bower_components/picturefill/external/matchmedia.js',
                './bower_components/hideShowPassword/hideShowPassword.js',
                './bower_components/picturefill/picturefill.js',
                './bower_components/on-media-query/js/onmediaquery.js',
                './js-src/functions.js']
};


// Compass
gulp.task('tasks.compass', function() {
    gulp.src(paths.compass)
        .pipe(tasks.compass({
            config_file: './config.rb',
            css: '.',
            sass: 'sass',
            image: 'img',
            font: 'fonts'
        }))
        
        .pipe(tasks.autoprefixer("last 2 versions", "> 1%", "ie 8"))
		.pipe(gulp.dest('.'))
        
        .pipe(tasks.livereload(server))
        .pipe(tasks.notify({ message: 'Sass complete' }))
});


// SVG optim
gulp.task('tasks.svgmin', function() {
    gulp.src(paths.svgmin)
        .pipe(tasks.svgmin())
        .pipe(gulp.dest('./img'))
        .pipe(tasks.livereload(server))
        .pipe(tasks.notify({ message: 'Svgoptim complete' }))
});


// SVG 2 png
gulp.task('tasks.svg2png', function () {
    gulp.src(paths.svg2png)
        .pipe(tasks.svg2png())
        .pipe(gulp.dest('./img'))
        .pipe(tasks.livereload(server))
        .pipe(tasks.notify({ message: 'Svg2png complete' }))
});


// Uglify
gulp.task('tasks.uglify', function() {
    gulp.src(paths.uglify)
        .pipe(tasks.concat('functions.min.js'))
        // Strip console and debugger statements from JavaScript code
        .pipe(tasks['strip-debug']())
        .pipe(tasks.uglify())
        .pipe(gulp.dest('./js'))
        .pipe(tasks.livereload(server))
        .pipe(tasks.notify({ message: 'Uglify complete' }));
});


// Watch
gulp.task('tasks.watch', function() {
    server.listen(35729, function(err) {
		if (err) {
			return console.log(err)
		}
    	gulp.watch(paths.compass, ['tasks.compass']);
    	gulp.watch(paths.scripts, ['tasks.uglify']);
    	gulp.watch(paths.svgmin, ['tasks.svgmin']);
    	gulp.watch(paths.svg2png, ['tasks.svg2png']);
    })
});


// Default
gulp.task('default', ['tasks.compass', 'tasks.uglify', 'tasks.svgmin', 'tasks.svg2png', 'tasks.watch']);