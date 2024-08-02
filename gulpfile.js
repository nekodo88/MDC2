const {watch, src, dest, series, parallel} = require('gulp');
const less = require('gulp-less');
const cssnano = require('gulp-cssnano');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const del = require('del');
const browserSync = require('browser-sync').create();


const templateDist = 'C:/xampp/htdocs/MDC2/wp-content/themes/mdc2';
const localTemplatePatch = 'http://localhost/mdc2/';

const config = {
    app: {
        js: [
            './src/scripts/**/*.js',
        ],
        //less: './src/*.less',
        less: './src/style/**/*.less',
        fonts: './src/fonts/**/*',
        images: './src/images/*.*',
        php: './src/**/*.php',
        inc: './src/inc/**/*',
        lang: './src/languages/*',

    },
    dist: {
        base: templateDist,
        scripts: templateDist + '/scripts/',
        fonts: templateDist + '/fonts/',
        images: templateDist + '/images/',
        inc: templateDist + '/inc/',
        lang: templateDist + '/languages/',
    }
}

function templateTask(done) {
    src(config.app.php)
        .pipe(dest(config.dist.base));

    src(config.app.lang)
        .pipe(dest(config.dist.lang));

    src(config.app.inc)
        .pipe(dest(config.dist.inc))

    done();
}

function cssTask(done) {

    src(config.app.less)
        .pipe(less())
        .pipe(concat('style.css'))
        // .pipe(cssnano())
        .pipe(dest(config.dist.base));

    // src(config.app.less)
    // .pipe(less())
    // .pipe(rename({ suffix: '.bundle' }))
    // .pipe(postcss([autoprefixer(), cssnano()]))
    // .pipe(dest(config.dist.base));

    done();
}

function jsTask(done) {
    src(config.app.js)
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(dest(config.dist.scripts))
    done();
}

function fontTask(done) {
    src(config.app.fonts)
        .pipe(dest(config.dist.fonts))
    done();
}

function imagesTask(done) {
    src(config.app.images)
        .pipe(dest(config.dist.images))
    done();
}

function watchFiles() {
    watch(config.app.js, series(jsTask, reload));
    watch(config.app.less, series(cssTask, reload));
    watch(config.app.fonts, series(fontTask, reload));
    watch(config.app.images, series(imagesTask, reload));
    watch(config.app.php, series(templateTask, reload));
    watch(config.app.lang, series(templateTask, reload));
}

function liveReload(done) {
    browserSync.init({
        // server: {
        //     baseDir: config.dist.localTemplate
        // },
        proxy: localTemplatePatch
    });
    done();
}

function reload(done) {
    browserSync.reload();
    done();
}

function cleanUp() {
    //return del([config.dist.base]);
    return;
}

exports.dev = parallel(jsTask, cssTask, fontTask, imagesTask, templateTask, watchFiles, liveReload);
exports.build = series(cleanUp, parallel(jsTask, cssTask, fontTask, imagesTask, templateTask));