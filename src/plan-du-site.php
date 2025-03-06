<?php

$page = "plan-du-site.php";
$title = "";
$description = "";
?>

<?php require_once "./components/head.php"; ?>

<body>
  <div id="wrapper">
    <?php require_once "./components/header.php" ?>


    <main id="additional-pages">
      <section class="wrapper">
        <div class="animation" data-animation="moveToDown">
          <h1>Plan du site</h1>

          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="sandbox.php">Sandbox</a></li>
            <li><a href="swiper.php">Template Swiper</a></li>
            <li><a href="contact.php">Template Contact</a></li>
            <li><a href="mentions-legales.php">Mentions légales</a></li>
            <li><a href="politique-de-confidentialite.php">Politique de confidentialité</a></li>
          </ul>
        </div>
      </section>
    </main>
  </div>

  <?php require_once "./components/footer.php"; ?>
</body>

</html>