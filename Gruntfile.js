module.exports = function(grunt) {
    grunt.initConfig({
        watch: {
            sass: {
                files: ['sass/**/*.{scss,sass}'],
                tasks: ['sass:dist', 'postcss:dist']
            },
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed',
                    compass: true
                },
                files: {
                    'html/stylesheets/main.css': 'sass/main.scss', // 'destination': 'source',
                    //                    'html/stylesheets/underconstruction.css': 'sass/underconstruction.scss', // 'destination': 'source',
                }
            }
        },
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')({
                        overrideBrowserslist: [
                            "defaults"
                        ]
                    })
                ]
            },
            dist: {
                src: 'html/stylesheets/main.css',
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-sass'); // https://github.com/gruntjs/grunt-contrib-sass
    //    grunt.loadNpmTasks('grunt-postcss'); // https://github.com/postcss/autoprefixer
    grunt.loadNpmTasks('@lodder/grunt-postcss'); // https://github.com/C-Lodder/grunt-postcss
    grunt.loadNpmTasks('grunt-contrib-watch'); // https://github.com/gruntjs/grunt-contrib-watch /// http://blog.grayghostvisuals.com/grunt/image-optimization/

    grunt.registerTask('default', ['sass:dist', 'postcss:dist', 'watch']);
};