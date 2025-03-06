<?php

$page = "404.php";
$title = "Page non trouvée | Template";
$description = "";
?>

<?php require_once "./components/head.php"; ?>

<body>
  <div id="wrapper">
    <?php require_once "./components/header.php" ?>

    <main id="additional-pages">
      <div class="wrapper">
        <div class="animation" data-animation="moveToUp">
          <h1>Page non trouvée - 404</h1>
        </div>

        <div class="animation" data-animation="moveToUp">
          <p>La page que vous recherchez n'existe plus ou a été déplacée.</p>
          <p><a href="index.php" class="btn">Retour à l'accueil</a></p>
        </div>
      </div>
    </main>
  </div>

  <?php require_once "./components/footer.php"; ?>
</body>

</html>