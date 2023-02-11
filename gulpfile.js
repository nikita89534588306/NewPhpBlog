var gulp = require("gulp")

//тестовый таск 
function copy(done){    
    gulp.src('./src/scss/main.scss') //берем файл по пути
        .pipe(  //далее...
            gulp.dest('./src/css/') //отправляем файл по пути './scr/css/' 
        );
    done();
}

gulp.task("default", copy);
