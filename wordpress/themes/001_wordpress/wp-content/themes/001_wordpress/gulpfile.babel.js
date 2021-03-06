import gulp from 'gulp';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import yargs from 'yargs';

const PRODUCTION = yargs.argv.prod;

const styles = () => {
    return gulp.src('src/assets/scss/bundle.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS({ compatability: 'ie8' })))
        .pipe(gulp.dest('dist/assets/css'));
};

export default styles;