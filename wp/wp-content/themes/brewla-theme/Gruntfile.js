module.exports = function(grunt){
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		/**
		 * Bower Concat
		 * Concat All Bower Deps
		 *
		 */
		bower_concat: {
			all: {
				dest: 'source/scripts/vendor-build/_bower.js',
				bowerOptions: {
					relative: false
				}
			}
		},
		/**
		 * Concat JS Files
		 * Concat all files into one
		 *
		 */
		concat: {
			dist: {
				src: ['source/scripts/vendor-build/*.js', 'source/scripts/*.js', '!source/scripts/vendor-non-build/*.js'],
				dest: 'source/scripts/build/app.js',
			}
		},
		/**
		 * Uglify
		 * Minifies JS files for production
		 *
		 */
		uglify: {
			build: {
				src: ['source/scripts/build/app.js'],
				dest: 'source/scripts/build/app.min.js',
				options: {
					banner: '/* HTML5 JS Boilerplate Five Design Build Date: ' + '<%= grunt.template.today("yyyy-mm-dd") %> */'
				}
			}
		},
		/**
		 * Compass settings, watches with grunt command
		 *
		 *
		 */
		compass: {
			dist: {
				options: {
					httpPath: "/wp-content/themes/brewla-theme/",
					sassDir: 'source/sass',
					cssDir: 'source/css',
					outputStyle: 'compressed',
					imagesDir: "assets/img",
					imagesPath: "source/img",
					generatedImagesDir: 'assets/img',
					fontsDir: "assets/fonts",
					fontsPath: "source/fonts",
					require: 'breakpoint',
					sourcemap: true
				}
			}
		},
		/**
		 * Image Optimization
		 *
		 *
		 */
		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'source/img/source',
					src: ['**/*.{png,jpg,gif,svg}'],
					dest: 'source/img/',
					optimizationLevel: 5
				}],
				png: {
					options: {
						optimizationLevel: 7
					}
				}
			}
		},
		/**
		 * Grunt Copy to Build
		 * @ grun on cli
		 *
		 */
		copy: {
			main: {
				files: [
				// includes files within path and its sub-directories
				{
					expand: true,
					cwd: 'source',
					src: ['*', 'scripts/build/app.min.js', 'scripts/vendor-non-build/**', 'includes/*', 'img/*', 'fonts/*', '!css/**', '!Gemfile', '!index.html', '!scripts/vendor-build', '!.sass-cache', '!img/source'],
					filter: 'isFile',
					dest: 'assets/'
				}],
			},
			css: {
				files: [
				// includes files within path and its sub-directories
				{
					expand: true,
					cwd: 'source/css',
					src: ['*'],
					filter: 'isFile',
					dest: ''
				}],
			}
		},
		'string-replace': {
			dist: {
				files: {
					'build/': 'build/**.html'
				},
				options: {
					replacements: [{
						pattern: /(<@versionstamp>)/ig,
						replacement: '<%= grunt.template.today("mmddyyyyhMMss") %>'
					}, {
						pattern: ',',
						replacement: ';'
					}]
				}
			}
		},
		clean: ["assets/**"],
		notify: {
			complete: {
				options: {
					title: 'GRUNT BUILD',
					// optional
					message: 'Build Complete',
					//required
				}
			}
		},
		/**
		 * Grunt Watch Command
		 * @ grun on cli
		 *
		 */
		watch: {
			scripts: {
				files: ['source/scripts/*.js'],
				tasks: ['bower_concat', 'concat', 'uglify']
			},
			images: {
				files: ['source/img/source/**/*.{png,jpg,gif}'],
				tasks: ['imagemin']
			},
			styles: {
				files: ['source/sass/**/*.scss'],
				tasks: ['compass']
			},
			copy: {
				files: ['source/**'],
				tasks: ['copy', 'string-replace', 'notify']
			}
		}
	});
	/**
	 * Load NPM Tasks
	 *
	 *
	 */
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-ftp-deploy');
	grunt.loadNpmTasks('grunt-bower-concat');
	grunt.loadNpmTasks('grunt-string-replace');
	grunt.loadNpmTasks('grunt-notify');
	grunt.loadNpmTasks('grunt-contrib-clean');
	/**
	 * Register Grunt Tasks
	 *
	 *
	 */
	grunt.registerTask('default', ['clean', 'compass', 'bower_concat', 'concat', 'uglify', 'imagemin', 'copy:main', 'copy:css', 'string-replace']);
	grunt.registerTask('deploy-prod', ['ftp-deploy']);
};