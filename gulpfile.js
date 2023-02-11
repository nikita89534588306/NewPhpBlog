var gulp = require("gulp")
var rename = require("gulp-rename") //подключаем модуль переименования файлов 

//тестовый таск 
function copy(done){    
    gulp.src('./src/scss/main.scss') //берем файл по пути
        // pipe() функция в которую передаем колбек для выполнения 
        // заданий последовательно 
        .pipe(rename("main.css"))  //пеиминовываем файл
        .pipe(gulp.dest('./src/css/') //отправляем файл по пути './scr/css/' 
    );
    done();
}

gulp.task("default", copy);
