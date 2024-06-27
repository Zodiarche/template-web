module.exports = function (grunt) {
  const autoprefixer = require("autoprefixer");

  grunt.initConfig({
    watch: {
      sass: {
        files: ["sass/**/*.{scss,sass}"],
        tasks: ["sass:dist", "postcss:dist"],
      },
    },

    sass: {
      dist: {
        options: {
          style: "compressed",
          compass: true,
        },

        // 'destination': 'source',
        files: {
          "html/stylesheets/main.css": "sass/main.scss",
          //  'html/stylesheets/underconstruction.css': 'sass/underconstruction.scss',
          // "wordpress/wp-content/themes/projectName/stylesheets/main.css":
          //   "sass/main.scss",
        },
      },
    },

    postcss: {
      options: {
        map: true,
        processors: [
          autoprefixer({
            overrideBrowserslist: ["defaults"],
          }),
        ],
      },

      dist: {
        src: "html/stylesheets/main.css",
      },
    },
  });

  // https://github.com/gruntjs/grunt-contrib-sass
  grunt.loadNpmTasks("grunt-contrib-sass");

  // https://github.com/postcss/autoprefixer
  //    grunt.loadNpmTasks('grunt-postcss');

  // https://github.com/C-Lodder/grunt-postcss
  grunt.loadNpmTasks("@lodder/grunt-postcss");

  // https://github.com/gruntjs/grunt-contrib-watch /// http://blog.grayghostvisuals.com/grunt/image-optimization/
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("default", ["sass:dist", "postcss:dist", "watch"]);
};
