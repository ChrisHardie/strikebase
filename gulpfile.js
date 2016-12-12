// Include Gulp
var gulp = require( 'gulp' );

// Include Plugins
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var babel = require("gulp-babel");
var imagemin = require( 'gulp-imagemin' );
var pngquant = require( 'imagemin-pngquant' );
var jshint = require( 'gulp-jshint' );
var concat = require( 'gulp-concat' );
var notify = require( 'gulp-notify' );
var cache = require( 'gulp-cache' );
var sourcemaps = require( 'gulp-sourcemaps' );
var csscomb = require( 'gulp-csscomb' );
var livereload = require( 'gulp-livereload' );
var svgmin = require( 'gulp-svgmin' );
var cheerio = require( 'gulp-cheerio' );
var svgstore = require( 'gulp-svgstore' );

// Styles tasks
gulp.task( 'styles', function() {
	return gulp.src( 'assets/stylesheets/style.scss' )
		.pipe( sourcemaps.init() )
		.pipe( sass( { style: 'expanded' } ) )
		.on( 'error', notify.onError( function( err ) {
			return "Stylesheet Error in " + err.message;
		} ) )
		.pipe( autoprefixer( { browsers: ['last 2 versions', 'ie >= 9'], cascade: false } ) )
		//.pipe( csscomb() )
		.pipe( sourcemaps.write( './', { includeContent: false, sourceRoot: 'source' } ) )
		.pipe( gulp.dest( './' ) )
		.pipe( livereload() );
});

// Scripts
/**
 * @TODO
 * Optional: Abstract jshint out into separate process
 * and run it on main JS dir after everything has been
 * transpiled from React.
 *
 * Currently running task on React project directory only.
 */
gulp.task( 'scripts', function() {
	return gulp.src( 'assets/js/src/**/*.js' )
		.pipe( sourcemaps.init() )
		.pipe( jshint() )
		.pipe( jshint.reporter( 'default' ) )
<<<<<<< 140ae37e20204a4420638cecda21e7b946ca4ef1
		.pipe( livereload() );
=======
		.pipe( concat( 'main.js' ) )
		.pipe( sourcemaps.write( './', { includeContent: false, sourceRoot: 'source' } ) )
		.pipe( gulp.dest( 'assets/js' ) );
		.pipe( notify( { message: 'Scripts task complete' } ) );
>>>>>>> Added Babel config for ES6 transpiling. Updated Gulp script task.
});

// Minify our icons and make them into an inline sprite
gulp.task( 'icons', function() {
	return gulp.src( 'assets/svg/icons/*.svg' )
		.pipe( svgmin() )
		.pipe( svgstore( {
			fileName: 'icons.svg',
			inlineSvg: true
		} ) )
		.pipe( cheerio( {
		run: function( $, file ) {
			$( 'svg' ).addClass( 'hide' );
		},
		parserOptions: { xmlMode: true }
		}))
		.pipe( gulp.dest( 'assets/svg' ) );
});

// Generate style guide assets.
gulp.task( 'style-guide', function() {
	return gulp.src( 'assets/style-guide/stylesheets/style-guide.scss' )
		.pipe( sass( { style: 'expanded' } ).on( 'error', sass.logError ) )
		.on( 'error', notify.onError( function( err ) {
			return "Stylesheet Error in " + err.message;
		} ) )
		.pipe( gulp.dest( 'assets/style-guide' ) )
});

// Watch files for changes
gulp.task( 'watch', function() {
	livereload.listen();
	gulp.watch( 'assets/**/*.scss', ['styles', 'style-guide'] );
	gulp.watch( 'assets/js/**/*.js', ['scripts'] );
	gulp.watch( 'assets/svg/icons/*', ['icons'] );
});

// Default Task
gulp.task( 'default', ['styles', 'scripts', 'icons', 'style-guide', 'watch'] );
