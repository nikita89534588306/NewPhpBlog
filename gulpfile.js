var gulp = require("gulp")

function defaultTask(done){
    console.log("Test");
    done();
}

function helloWorld(done){
    console.log("helloWorld");
    done();
}

gulp.task("hi", helloWorld);
gulp.task("default", defaultTask);
