module.exports = function(grunt) {

    // Load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    // Config & tasks
    grunt.initConfig({
        compass: {
            build: {
                options: {
                    sassDir: 'sass',
                    cssDir: '.',
                    environment: 'production'
                },
                tasks: ['notify:compass'],
            },
        },
        uglify: {
            build: {
                options: {
                    mangle: false
                },
                files: [{
                    'js/functions.min.js': ['bower_components/hideShowPassword/hideShowPassword.js','bower_components/on-media-query/js/onmediaquery.js','bower_components/picturefill/picturefill.js','js-src/functions.js'],
                    'js/zepto.min.js': ['bower_components/zepto/zepto.js'],
                    //Modernizr is compiled and uglified using grunt modernizr
                }],
                tasks: ['notify:uglify'],
            },
        },
        svgmin: {
            build: {
                options: {
                    plugins: [{
                        removeViewBox: false,
                        removeUselessStrokeAndFill: true,
                        removeEmptyAttrs: true
                    }],
                },
                files: [{
                    expand: true,
                    cwd: 'img-src',
                    src: '*.svg',
                    dest: 'img',
                    ext: '.svg'
                }],
                tasks: ['notify:svgmin'],
            },
        },
        svg2png: {
            build: {
                files: [{
                    expand: true,
                    flatter: true,
                    src: 'img-src/*.svg',
                    dest: 'img'
                }],
                tasks: ['notify:svg2png'],
            },
        },
        imageoptim: {
            build: {
                options: {
                    jpegMini: true,
                    imageAlpha: true,
                    quitAfter: false
                },
                files: [{
                    src: ['**/*.{png,jpg,gif}'],
                }],
                tasks: ['notify:imageoptim'],
            },
        },
        imagemin: {
            build: {
                options: {
                    optimizationLevel: 3
                },
                files: [{
                    expand: true,
                    cwd: 'img',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img'
                }],
                tasks: ['notify:imagemin'],
            },
        },
        modernizr: {
            // [REQUIRED] Path to the build you're using for development.
            'devFile' : 'js-src/modernizr.custom.js',
        
            // [REQUIRED] Path to save out the built file.
            'outputFile' : 'js/modernizr.min.js',
        
            // Based on default settings on http://modernizr.com/download/
            'extra' : {
                'shiv' : true,
                'printshiv' : false,
                'load' : false,
                'mq' : false,
                'cssclasses' : true
            },
        
            // Based on default settings on http://modernizr.com/download/
            'extensibility' : {
                'addtest' : true,
                'prefixed' : true,
                'teststyles' : true,
                'testprops' : true,
                'testallprops' : true,
                'hasevents' : false,
                'prefixes' : true,
                'domprefixes' : true
            },
        
            // By default, source is uglified before saving
            'uglify' : true,
        
            // Define any tests you want to implicitly include.
            'tests' : ['boxshadow','csstransforms','csstransforms3d','csstransitions','svg','input','geolocation','forms_fileinput'],
        
            // By default, this task will crawl your project for references to Modernizr tests.
            // Set to false to disable.
            'parseFiles' : false,
        
            // When parseFiles = true, this task will crawl all *.js, *.css, *.scss files, except files that are in node_modules/.
            // You can override this by defining a 'files' array below.
            // 'files' : [],
        
            // When parseFiles = true, matchCommunityTests = true will attempt to
            // match user-contributed tests.
            'matchCommunityTests' : false,
        
            // Have custom Modernizr tests? Add paths to their location here.
            'customTests' : ['js-src/modernizr.touch.js']
        },
        watch: {
            compass: {
                files: ['sass/*.scss','sass/**/*'],
                tasks: ['compass:build', 'notify:compass'],
            },
            uglify: {
                files: ['js-org/*.js'],
                tasks: ['uglify:build', 'notify:uglify'],
            },
            svg2png: {
                files: ['img/*.svg'],
                tasks: ['svg2png:build', 'notify:svg2png'],
            },
        },
        notify: {
            compass: {
                options: {
                    title: 'Compass',
                    message: 'Complete',
                },
            },
            svgmin: {
                options: {
                    title: 'SVGmin complete',
                    message: 'Complete',
                },
            },
            svg2png: {
                options: {
                    title: 'Svg2png',
                    message: 'Complete',
                },
            },
            imagemin: {
                options: {
                    title: 'Imagemin',
                    message: 'Complete',
                },
            },
            imageoptim: {
                options: {
                    title: 'Imageoptim',
                    message: 'Complete',
                }
            },
            uglify: {
                options: {
                    title: 'Uglify',
                    message: 'Complete',
                },
            },
        },
    });
    
    // Automatic notifications when tasks fail.
    grunt.loadNpmTasks('grunt-notify');
    
    // Default task
    grunt.registerTask('default', ['watch']);
    
    // Run at the start of every new project
    grunt.registerTask('init', ['modernizr:build','uglify:build']);
    
    // Image optimization. Best to run at the end of a project
    grunt.registerTask('imgtask', ['svgmin:build', 'svg2png:build', 'imageoptim:build', 'imagemin:build']);
    
};