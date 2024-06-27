<div id="header">
  <div class="wrapper">
    <div class="cols">
      <div class="col-l">
        <?php if ($page === "index.php") { ?>
          <h1 class="site-title"><a href="index.php" rel="home" title="Retour à l'accueil">Titre Template</a></h1>
        <?php } else { ?>
          <p class="site-title"><a href="index.php" rel="home" title="Retour à l'accueil">Titre Template</a></p>
        <?php } ?>
      </div>

      <div class="col-r">
        <nav id="header-nav">
          <ul>
            <li><a href="index.php" class="header-link">Accueil</a></li>
            <li><a href="sandbox.php" class="header-link">Sandbox</a></li>
            <li><a href="swiper.php" class="header-link">Template Swiper</a></li>
            <li id="btn-contact"><a href="contact.php" class="header-link">Template Contact</a></li>
          </ul>
        </nav>

        <button aria-pressed="false" type="button" id="menu-button" tabindex="1"><span class="burger"></span><span class="menu-title">Afficher le menu</span></button>
      </div>
    </div>
  </div>
</div>