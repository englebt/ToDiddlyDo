'use strict';

// include gulp
var gulp = require('gulp');

// include plugins
var bs = require('browser-sync').create(),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    autoprefixer = require('gulp-autoprefixer');


var BROWSER_SYNC_RELOAD_DELAY = 500;

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    bs.init({
        server: "./www/views",
        baseDir: "app",
        port: 8080,
        online: true,
        open: "local",
        // tunnel: true,
        // tunnel: "my-private-site"
    });

    gulp.watch("./www/src/scss/**/*.scss", ['sass']);
    gulp.watch("./www/src/js/**/*.js", ['js']).on('change', bs.reload);
    gulp.watch(["./www/views/*.twig", "./www/views/partials/*.twig"]).on('change', bs.reload);
});

gulp.task('nodemon', function(cb) {
    var called = false;
    return nodemon({

            // nodemon our expressjs server
            script: 'server.js',

            // watch core server file(s) that require server restart on change
            watch: ['server.js']
        })
        .on('start', function onStart() {
            // ensure start only got called once
            if (!called) { cb(); }
            called = true;
        })
        .on('restart', function onRestart() {
            // reload connected browsers after a slight delay
            setTimeout(function reload() {
                bs.reload({
                    stream: false
                });
            }, BROWSER_SYNC_RELOAD_DELAY);
        });
});

gulp.task('plumber', ['sass'], function() {
    gulp.src('./www/src/*.scss')
        .pipe(plumber())
        .pipe(sass())
        // .pipe(uglify())
        .pipe(plumber.stop())
        .pipe(gulp.dest('./www/views/css/'));
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("./www/src/scss/main.scss")
        .pipe(sass({
            outputStyle: 'compressed',
        }).on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {
            cascade: true
        }))
        .pipe(gulp.dest('./www/views/css/'))
        .pipe(bs.stream());
});

gulp.task('js', function() {
    return gulp.src('./www/src/js/*.js')
        .pipe(gulp.dest('./www/views/js/'));
});


gulp.task('default', ['serve']);
