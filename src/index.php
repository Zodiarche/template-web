<?php

$page = "index.php";
$title = "";
$description = "";
?>

<?php require_once "./components/head.php"; ?>

<body class="home">
  <div id="wrapper">
    <?php require_once "./components/header.php" ?>


    <main id="main">
      <section id="main-section">
        <div class="wrapper">
          <div>
            <h1 class="" data-animation="">Titre de niveau 1</h1>
            <h2 class="" data-animation="">Titre de niveau 2</h2>
            <h3 class="" data-animation="">Titre de niveau 3</h3>
            <h4 class="" data-animation="">Titre de niveau 4 avec une balise small <small>(ne doit pas être plus petit que le texte courant)</small></h4>

            <p class="" data-animation="">Paragraphe de taille 16px (1.6rem). Peut descendre jusqu'à un minimum de 14px.</p>

            <p class="" data-animation=""><img class="float-right" data-animation="" src="https://via.placeholder.com/400x300.png" alt="">Une image avec un ratio de 4/3 !</p>

            <ul>
              <li class="" data-animation="">Elément de liste 1</li>
              <li class="" data-animation="">Elément de liste 2 avec <a href="#">un lien</a> avec au moins un :hover et :focus, le :active est optionnel.</li>
              <li class="" data-animation="">Elément de <strong>liste 3</strong></li>
            </ul>

            <p class="" data-animation=""><a href="index.php" class="btn">Un lien qui doit apparaitre comme un bouton</a></p>

            <blockquote cite="https://fr.wikiquote.org/wiki/La_Folie_des_grandeurs" class="" data-animation="">
              <p>Mais qu'est-ce que je vais devenir ? Je suis ministre, je ne sais rien faire !</p>
              <p>Louis de Funès - <cite>La Folie des grandeurs</cite> (1971), écrit par Gérard Oury</p>
            </blockquote>
          </div>
        </div>
      </section>
    </main>
  </div>

  <?php require_once "./components/footer.php"; ?>
</body>

</html>