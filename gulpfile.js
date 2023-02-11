var gulp = require("gulp")
var rename = require("gulp-rename") //подключаем модуль переименования файлов 
const sass = require('gulp-sass')(require('sass')); //подключаем модуль препроцессора sass


function sassToCSS(done){    
    gulp.src('./src/scss/main.scss') //берем файл по пути
        // pipe() функция в которую передаем колбек для выполнения 
        // заданий последовательно 
        .pipe(
            sass(                               //переводим sass в css
                { errorLogToConsole: true,      //настройка: выводить ошибки в консоль
                  outputStyle: 'compressed'     //минифицируем файл
                }      
            )
        )
        .on("error", console.error.bind(console)) //ОБРАБОТЧИК СОБЫТИЙ - БЕЗ НЕГО НЕ ВЫВОДЯТСЯ ОШИБКИ ОТ ПРЕПРОЦЕССОТА SASS
        .pipe(
            rename(                             //функция для переименования файла
                {suffix: ".min"},                   //добавление суффикса
                "main.css"                          //имя файла
            )
        )  
        .pipe(
            gulp.dest(          //отправляем файл по пути ...
                './src/css/'    // './scr/css/' 
            ) 
    );
    done();
}

gulp.task("default", sassToCSS);
