const gulp = require('gulp');
const critical = require('critical');

const { watch, parallel, dest, src } = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify-es').default;
const imagemin = require('gulp-imagemin');
const changed = require('gulp-changed');

// JS
function scripts() {
    return src('./assets/js/src/*.js')
        .pipe(changed('./assets/js/dist'))
        .pipe(concat('scripts.js'))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify().on('error', console.error))
        .pipe(dest('./assets/js/dist'))
}

// CSS
function sassToCSS() {
    return src('./assets/sass/style.scss')
        .pipe(changed('./assets/css'))
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({ cascade: false }))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(rename('style.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./'))
}

// IMG Optimize
function imgoptimize() {
    return src('./assets/img/src/*')
        .pipe(changed('./assets/img/dist'))
        .pipe(imagemin())
        .pipe(dest('./assets/img/dist'));
}

// File Watcher
function fileWatcher() {
    watch('./assets/sass/**/*.scss', sassToCSS);
    watch('./assets/js/src/*.js', scripts);
    watch('./assets/img/src/*', imgoptimize);
}

exports.watch = parallel(fileWatcher);
exports.default = parallel(scripts, sassToCSS, imgoptimize);

gulp.task('critical', async() => {

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/',
        css: 'style.css',
        target: 'home.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-story/',
        css: 'style.css',
        target: 'our-story.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-stones/',
        css: 'style.css',
        target: 'our-stones.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-stones/sapphires/',
        css: 'style.css',
        target: 'stone.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-services/',
        css: 'style.css',
        target: 'our-services.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-services/sourcing-origins/',
        css: 'style.css',
        target: 'sourcing.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-factory/',
        css: 'style.css',
        target: 'our-factory.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-responsibility/',
        css: 'style.css',
        target: 'our-responsibility.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/contact-us/',
        css: 'style.css',
        target: 'contact-us.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/blog/',
        css: 'style.css',
        target: 'blog.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/post-12/',
        css: 'style.css',
        target: 'post.min.css',
      });

      critical.generate({
        base: 'assets/css/critical/',
        src: 'http://gems.test/our-services/sourcing-origins/mozambique/',
        css: 'style.css',
        target: 'default-page.min.css',
      });
});
