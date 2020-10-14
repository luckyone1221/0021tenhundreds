var gulp       	 = require('gulp'), // Подключаем Gulp
	sass         = require('gulp-sass'), //Подключаем Sass пакет,
	browserSync  = require('browser-sync'), // Подключаем Browser Sync
	concat       = require('gulp-concat'), // Подключаем gulp-concat (для конкатенации файлов)
	uglify       = require('gulp-uglifyjs'), // Подключаем gulp-uglifyjs (для сжатия JS)
	cssnano      = require('gulp-cssnano'), // Подключаем пакет для минификации CSS
	cleanCSS 	 		= require('gulp-clean-css'), //очистка от мусора
	rename       = require('gulp-rename'), // Подключаем библиотеку для переименования файлов // not working!!
	del          = require('del'), // Подключаем библиотеку для удаления файлов и папок
	imagemin     = require('gulp-imagemin'), // Подключаем библиотеку для работы с изображениями
	pngquant     = require('imagemin-pngquant'), // Подключаем библиотеку для работы с png
	cache        = require('gulp-cache'), // Подключаем библиотеку кеширования
	autoprefixer = require('gulp-autoprefixer');// Подключаем библиотеку для автоматического добавления префиксов

//custom js compile
var commonJsSrc = 'catalog/view/theme/elki/new-js/new-common.js'; //remake
var domain = 'http://ten2-hundreds.loc/';
var babel = require('gulp-babel');

//
gulp.task('sass', function() { // Создаем таск Sass
	return gulp.src('wp-content/themes/benaa-child/css/*.sass') // Берем источник
		.pipe(sass()) // Преобразуем Sass в CSS посредством gulp-sass
		.pipe(autoprefixer(['last 15 versions', '> 1%',], { cascade: true })) // Создаем префиксы
		.pipe(cleanCSS())// очистка от мусора
		.pipe(gulp.dest('wp-content/themes/benaa-child/css/')) // Выгружаем результата в папку app/css
		.pipe(browserSync.reload({stream: true})); // Обновляем CSS на странице при изменении
});

gulp.task('browser-sync', function() { // Создаем таск browser-sync
	browserSync({ // Выполняем browserSync
		proxy: `${domain}`,
		notify: false // Отключаем уведомления
	});
});
gulp.task('custom-js', function() {
	return gulp.src(commonJsSrc)
		.pipe(concat('new-common.min.js'))
		.pipe(babel())
		//.pipe(uglify())
		.pipe(gulp.dest('catalog/view/theme/elki/new-js/'))
		.pipe(browserSync.reload({stream: true}));
});



gulp.task('watch', function() {
	gulp.watch('wp-content/themes/benaa-child/css/*.sass', gulp.parallel('sass')); // Наблюдение за sass файлами
	//gulp.watch('catalog/view/theme/elki/new-js/new-common.js', gulp.parallel('custom-js')); // Наблюдение за главным JS файлом и за библиотеками
});
gulp.task('default', gulp.parallel('sass', 'watch', 'browser-sync'));
//, 'custom-js'