var gulp = require('gulp'),
    gutil = require('gulp-util'),
    compass = require('gulp-compass'),
    plumber = require('gulp-plumber'),
    uglify = require('gulp-uglify'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    csso = require('gulp-csso'),
    autoprefixer = require('gulp-autoprefixer'),
    jshint = require('gulp-jshint'),
    htmlhint = require("gulp-htmlhint"),
    cmq = require('gulp-combine-media-queries')
;

gulp.task('css', function() {
    gulp.src(['sass/**/*.sass', 'sass/**/*.scss'])
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }}))
        .pipe(compass({
            css: 'css',
            sass: 'sass',
            image: 'img'
        }))
        .on('error', function(err) {
            // Would like to catch the error here
        })
        .pipe(autoprefixer({
            remove: false
        }))
        //.pipe(cmq({ log: true }))
        //.pipe(csso())
        .pipe(gulp.dest('./css'))
    ;
});

gulp.task('js', function() {
    return gulp.src(
        [
            'vendor/angular/angular.js',
            //'vendor/angular-route/angular-route.js',
            'vendor/angular-ui-router/release/angular-ui-router.js',
            //'vendor/jquery/dist/jquery.js',
            //'vendor/bootstrap/dist/js/bootstrap.js',
            'app/app.module.js',
            'app/shared/*.js',
            'app/components/menu/*.js',
            'app/components/main/*.js',
            'app/components/speakers/*.js',
            'app/components/pages/*.js',
            'app/app.routes.js'
        ]
    )
        .pipe(concat('compiled.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./js'));
});

gulp.task('htmlHint', function() {
    gulp.src('./index.html')
        .pipe(htmlhint({
            'tag-pair': true,
            'tagname-lowercase': true,
            'attr-lowercase': true,
            'attr-value-double-quotes': true,
            'doctype-first': true,
            'spec-char-escape': true,
            'id-unique': true,
            'style-disabled': true
        }))
        .pipe(htmlhint.failReporter());
});

gulp.task('watch', function() {
    // watch scss files
    gulp.watch(['sass/**/*.sass', 'sass/**/*.scss'], function() {
        gulp.run('css');
    });

    // watch JS modules files
    //gulp.watch('js/modules/*.js', function() {
    //    gulp.run('jsHintModules');
    //});

    // concat JS
    gulp.watch('app/**/*.js', function() {
        gulp.run('js');
    });

    // concat JS
    gulp.watch('gulpfile.js', function() {
        gulp.run('css');
        gulp.run('js');
    });
});

gulp.task('default', ['watch']);