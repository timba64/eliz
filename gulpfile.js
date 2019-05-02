const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const gulpIf = require('gulp-if');
const newer = require('gulp-newer');
const imagemin = require('gulp-imagemin');
const debug = require('gulp-debug');
const browserSync = require('browser-sync').create();
const rev = require('gulp-rev');
const tropka = process.cwd();

const isDevelopment = !process.env.NODE_ENV || process.env.NODE_ENV === 'development';
// NODE_ENV=production gulp build

gulp.task('styles', function() {
  return gulp.src('frontend/scss/**/*.*')
    .pipe(gulpIf(isDevelopment, sourcemaps.init()))
    .pipe(gulpIf(isDevelopment, sass().on('error', sass.logError), sass({ outputStyle: 'compressed' }).on('error', sass.logError)))
    .pipe(debug({ title: 'styles' }))
    .pipe(gulpIf(isDevelopment, sourcemaps.write()))
    .pipe(gulpIf(!isDevelopment, rev()))
    .pipe(gulp.dest(tropka));
});

gulp.task('assets', function() {
  return gulp.src(['frontend/assets/**/*.*', '!assets/img/*'], { since: gulp.lastRun('assets') })
    .pipe(newer(tropka))
    .pipe(debug({ title: 'assets' }))
    .pipe(gulp.dest(tropka));
});

gulp.task('js', function() {
  return gulp.src('frontend/js/*.*', { since: gulp.lastRun('js') })
    .pipe(newer('js'))
    .pipe(gulp.dest('js'));
});

gulp.task('image:min', function() {
  return gulp.src('frontend/assets/img/**/*.*', { since: gulp.lastRun('image:min') })
    .pipe(newer(tropka + '/img'))
    .pipe(imagemin())
    .pipe(debug({ title: 'imagemin' }))
    .pipe(gulp.dest(tropka + '/img'));
});

gulp.task('build', gulp.series('styles'));

gulp.task('watch', function() {
  gulp.watch('frontend/scss/**/*.*', gulp.series('styles'));
  gulp.watch('frontend/assets/**/*.*', gulp.series('assets'));
  gulp.watch('frontend/js/*.*', gulp.series('js'));
  gulp.watch('frontend/assets/img/*.*', gulp.series('image:min'));
});

gulp.task('serve', function() {
  browserSync.init({
    proxy: "elising.loc"
    //server: tropka
  });
  browserSync.watch('./*.*').on('change', browserSync.reload);

});

gulp.task('dev', gulp.series('build', gulp.parallel('watch', 'serve')));
