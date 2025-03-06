module.exports = function (grunt) {
  // Configuration des tâches Grunt
  grunt.initConfig({
    watch: {
      // Surveillance des fichiers Sass et exécution des tâches associées
      sass: {
        // Surveille tous les fichiers Sass/SCSS
        files: ["sass/**/*.{scss,sass}"],
        // Compile Sass et applique PostCSS lors d'une modification
        tasks: ["sass:dist", "postcss:dist"],
      },

      // Surveillance des fichiers JS et exécution des tâches associées
      js: {
        // Surveille tous les fichiers JS
        files: ["javascripts/**/*.js"],
        // Nettoie, concatène et minifie les fichiers JS modifiés
        tasks: ["clean:js", "concat", "uglify"],
      },
    },

    // Compilation des fichiers Sass en CSS
    sass: {
      dist: {
        options: {
          // Génère du CSS minifié
          style: "compressed",
        },
        files: {
          // Destination : Source
          "src/stylesheets/main.css": "sass/main.scss",
        },
      },
    },

    // Application de PostCSS, notamment pour l'ajout d'autoprefixes
    postcss: {
      options: {
        // Génère une source map pour faciliter le débogage
        map: true,
        processors: [
          require("autoprefixer")({
            // Ajoute des préfixes pour la compatibilité avec les navigateurs courants
            overrideBrowserslist: ["defaults"],
          }),
        ],
      },
      dist: {
        // Fichier CSS sur lequel appliquer PostCSS
        src: "src/stylesheets/main.css",
      },
    },

    // Conversion des images PNG/JPG en WebP pour optimiser le poids des images
    cwebp: {
      dynamic: {
        options: {
          // Qualité maximale
          q: 100,
        },
        files: [
          {
            // Active le mode dynamique
            expand: true,
            // Dossier source
            cwd: "src/images",
            // Sélectionne toutes les images PNG et JPG
            src: ["**/*.{png,jpg,jpeg}"],
            // Destination identique à la source (remplacement des images)
            dest: "src/images",
          },
        ],
      },
    },

    // Suppression des fichiers JS minifiés avant de les recréer
    clean: {
      js: [
        // Fichier JS combiné
        "src/javascripts/minify/combined.js",
        // Version minifiée du fichier combiné
        "src/javascripts/minify/combined.js.min.js",
      ],
    },

    // Concaténation des fichiers JS en un seul
    concat: {
      dist: {
        src: [
          // Tous les fichiers JS
          "src/javascripts/**/*.js",
          // Exclut les modules spécifiques
          "!src/javascripts/modules/**/*.js",
          // Exclut index.js
          "!src/javascripts/index.js",
        ],
        // Destination du fichier combiné
        dest: "src/javascripts/minify/combined.js",
      },
    },

    // Minification du fichier JS concaténé
    uglify: {
      dist: {
        files: {
          "src/javascripts/minify/combined.min.js": [
            "src/javascripts/minify/combined.js",
          ],
        },
      },
    },

    // Minification HTML
    htmlmin: {
      dist: {
        options: {
          // Supprime les commentaires HTML
          removeComments: true,
          // Réduit les espaces inutiles
          collapseWhitespace: true,
        },
        // Nettoie les fichiers PHP avant minification
        tasks: ["clean:php"],
        files: {
          // Destination : Source
          "src/minify/index.php": "src/index.php",
        },
      },
    },
  });

  // Chargement des plugins Grunt

  // Compilation Sass
  grunt.loadNpmTasks("grunt-contrib-sass");

  // Ajout des préfixes CSS
  grunt.loadNpmTasks("@lodder/grunt-postcss");

  // Conversion des images en WebP
  grunt.loadNpmTasks("grunt-cwebp");

  // Nettoyage JS
  // grunt.loadNpmTasks("grunt-contrib-clean");

  // Concaténation JS
  // grunt.loadNpmTasks("grunt-contrib-concat");

  // Minification JS
  // grunt.loadNpmTasks("grunt-contrib-uglify");

  // Minification HTML
  grunt.loadNpmTasks("grunt-contrib-htmlmin");

  // Surveillance des fichiers
  grunt.loadNpmTasks("grunt-contrib-watch");

  // Définition de la tâche par défaut
  grunt.registerTask("default", [
    // Compilation Sass
    "sass:dist",

    // Ajout des préfixes CSS
    "postcss:dist",

    // Conversion des images en WebP
    "cwebp",

    // Nettoyage JS
    // "clean:js",

    // Concaténation JS
    // "concat",

    // Minification JS
    // "uglify",

    // Minification HTML
    // "htmlmin",

    // Surveillance des fichiers
    "watch",
  ]);
};
