
const elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');

elixir(function(mix) {
	mix.sass('app.scss');
});

/** CSS Preprocessors */
gulp.task( "sass", function () {
	return gulp.src( "resources/assets/sass/app.scss" )
		.pipe( sass({
			style: "expanded",
			precision: 10
		}))
		.on( "error", function( e ) {
			console.error( e );
		})
		.pipe( gulp.dest( "public/css" ) );
});

gulp.task( "default", ["watch"] );