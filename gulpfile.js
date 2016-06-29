'use strict';

// include gulp
var gulp = require('gulp');

// include plugins
var bs = require('browser-sync').create(),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    nodemon = require('gulp-nodemon'),
    autoprefixer = require('gulp-autoprefixer'),
    historyApiFallback = require('connect-history-api-fallback');


var BROWSER_SYNC_RELOAD_DELAY = 500;

// Static Server + watching scss/html files
gulp.task('serve', ['sass', 'nodemon'], function() {

    bs.init({
        server: "./public",
        baseDir: "app",
        middleware: [historyApiFallback()],
        port: 8080,
        online: true,
        open: "local",
        // tunnel: true,
        // tunnel: "my-private-site"
    });

    gulp.watch("./src/scss/**/*.scss", ['sass']);
    gulp.watch("./src/js/**/*.js", ['js']).on('change', bs.reload);
    gulp.watch(["./public/*.html", "./public/partials/*.html"]).on('change', bs.reload);
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
    gulp.src('./src/*.scss')
        .pipe(plumber())
        .pipe(sass())
        // .pipe(uglify())
        .pipe(plumber.stop())
        .pipe(gulp.dest('./public/css/'));
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("./src/scss/style.scss")
        .pipe(sass({
            outputStyle: 'compressed',
        }).on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {
            cascade: true
        }))
        .pipe(gulp.dest('public/css/'))
        .pipe(bs.stream());
});

gulp.task('js', function() {
    return gulp.src('./src/js/*.js')
        .pipe(gulp.dest('public/js/'));
});


gulp.task('default', ['serve']);
