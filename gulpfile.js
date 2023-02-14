var gulp = require("gulp")
var rename = require("gulp-rename") //подключаем модуль переименования файлов 
const sass = require('gulp-sass')(require('sass')); //подключаем модуль препроцессора sass
const autopre = require('gulp-autoprefixer') //подключаем модуль автопрефиксера
var hash = require('gulp-hash'); //ДОБАВЛЕНИЕ ХЕША ДЛЯ ФАЙЛА


function sassToCSS(done){    
    gulp.src('./scss/**/*', {nodir: true}) //берем файл по пути
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
            autopre(                                    //функция модуля автопрефиксера                                
                {
                    overrideBrowserslist: ['last 4 versions'],     // последние 10 версий
                    cascade: false
                }
            )
        )
        .pipe(
            rename(                             //функция для переименования файла
                {suffix: ".min"},                   //добавление суффикса
                "main.css"                          //имя файла
            )
        )  
		//ДОБАВЛЕНИЕ ХЕША ДЛЯ ФАЙЛА
		.pipe(hash()) // добавляем хеш к файлу
        .pipe(
            gulp.dest(          //отправляем файл по пути ...
                 './localhost/app/css'    // './scr/css/' 
            ) 
		)

		
		//далее каждый раз мы должны записывать файл манифест
		.pipe(hash.manifest('./assets.json', { // создать файл манифеста и папки указанные в пути
			deleteOld: true,					//обновлять версии ХЕША - да
			sourceDir: './localhost/app/css' 	//файл с которым работаем находится в дириктории ...
			}))
		.pipe(
			gulp.dest('.') // записать файл манифеста
		); 

    done();
}

function watchSASS(){
    gulp.watch("./scss/**/*", sassToCSS)
}

gulp.task("default", watchSASS);
