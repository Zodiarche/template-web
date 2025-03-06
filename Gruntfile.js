module.exports = function (grunt) {
  grunt.initConfig({
    watch: {
      sass: {
        files: ["sass/**/*.{scss,sass}"],
        tasks: ["sass:dist", "postcss:dist"],
      },

      js: {
        files: ["javascripts/**/*.js"],
        tasks: ["clean:js", "concat", "uglify"],
      },
    },

    sass: {
      dist: {
        options: {
          style: "compressed",
        },

        files: {
          //                    'wordpress/wp-content/themes/a2f-2024/stylesheets/main.css': 'sass/main.scss',
          "html/stylesheets/main.css": "sass/main.scss",
        },
      },
    },

    postcss: {
      options: {
        map: true,
        processors: [
          require("autoprefixer")({
            overrideBrowserslist: ["defaults"],
          }),
        ],
      },

      dist: {
        //                src: 'wordpress/wp-content/themes/a2f-2024/stylesheets/main.css',
        src: "html/stylesheets/main.css",
      },
    },

    cwebp: {
      dynamic: {
        options: {
          q: 100,
        },

        files: [
          {
            expand: true,
            cwd: "wordpress/wp-content/themes/a2f-2024/images/",
            src: ["**/*.{png,jpg,jpeg}"],
            dest: "wordpress/wp-content/themes/a2f-2024/images/",
          },
        ],
      },
    },

    clean: {
      js: [
        "wordpress/wp-content/themes/a2f-2024/javascripts/002_combined/combined.js",
        "wordpress/wp-content/themes/a2f-2024/javascripts/002_combined/combined.min.js",
      ],
    },

    concat: {
      dist: {
        src: [
          "wordpress/wp-content/themes/a2f-2024/javascripts/**/*.js",
          "!wordpress/wp-content/themes/a2f-2024/javascripts/000_modules/**/*.js",
          "!wordpress/wp-content/themes/a2f-2024/javascripts/002_tarteaucitron/**",
          "!wordpress/wp-content/themes/a2f-2024/javascripts/index.js",
        ],
        dest: "wordpress/wp-content/themes/a2f-2024/javascripts/002_combined/combined.js",
      },
    },

    uglify: {
      dist: {
        files: {
          "wordpress/wp-content/themes/a2f-2024/javascripts/002_combined/combined.min.js":
            [
              "wordpress/wp-content/themes/a2f-2024/javascripts/002_combined/combined.js",
            ],
        },
      },
    },

    // htmlmin: {
    //   dist: {
    //     options: {
    //       removeComments: true,
    //       collapseWhitespace: true,
    //     },

    //     tasks: ['clean:php'],

    //     files: {
    //       'html/index.php': 'html/qr-code-contact.php',
    //     },
    //   },
    // },
  });

  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("@lodder/grunt-postcss");
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-cwebp");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-contrib-concat");
  grunt.loadNpmTasks("grunt-contrib-clean");
  // grunt.loadNpmTasks('grunt-contrib-htmlmin');

  grunt.registerTask("default", [
    "sass:dist",
    "postcss:dist",
    //        'cwebp',
    //        'clean:js',
    //        'concat',
    //        'uglify',
    // 'htmlmin',
    "watch",
  ]);
};
