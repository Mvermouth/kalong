var gulp = require('gulp');
var babel = require('gulp-babel');
var connect = require('gulp-connect');
var browserify = require('gulp-browserify');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var gulpsync = require('gulp-sync')(gulp);

gulp.task('compile-es6', function() {
  return gulp.src('es6/*') //读取
    .pipe(babel({ //管道要干嘛的意思吧应该
      presets: ['es2015'] 
    }))
    .pipe(gulp.dest('js'));//输出到哪里
});

// gulp.task('pack-js', function() {
//   return gulp.src('app/js/main.js')
//     .pipe(browserify())
//     .pipe(rename('bundle.js'))
//     .pipe(gulp.dest('app/bundle'));
// });

// gulp.task('compress-bundle', function() {
//   return gulp.src('app/bundle/bundle.js')
//     .pipe(uglify())
//     .pipe(rename('bundle.min.js'))
//     .pipe(gulp.dest('app/bundle'));
// });

//build source files to released bundle file
//'pack-js', 'compress-bundle'
gulp.task('build',gulpsync.sync(['compile-es6']), function() {
  if (process.argv.pop() == '--dev') { //执行不知道什么鬼
    //watch any change and then re-run the tasks
    gulp.watch('es6/*', gulpsync.sync(['compile-es6']));//大概好似es6下面有文件变动就执行这个任务
  }
});

//run a server listening at port 8000
gulp.task('server', function() {
  connect.server({
    root: 'app',
    port: 8000,
    livereload: true
  });
});