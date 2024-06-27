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
            <h1 class="animation" data-animation="moveToDown">Titre de niveau 1</h1>
            <h2 class="animation" data-animation="moveToRight">Titre de niveau 2</h2>
            <h3 class="animation" data-animation="moveToLeft">Titre de niveau 3</h3>
            <h4 class="animation" data-animation="moveToUp">Titre de niveau 4 avec une balise small <small>(ne doit pas être plus petit que le texte courant)</small></h4>

            <p class="animation" data-animation="flash">Paragraphe de taille 16px (1.6rem). Peut descendre jusqu'à un minimum de 14px.</p>

            <p class="animation" data-animation="scaleDown"><img class="float-right animation visible" data-animation="bounce" src="https://via.placeholder.com/400x300.png" alt="">Une image avec un ratio de 4/3 !</p>

            <ul>
              <li class="animation" data-animation="scaleUp">Elément de liste 1</li>
              <li class="animation" data-animation="scaleDown">Elément de liste 2 avec <a href="#">un lien</a> avec au moins un :hover et :focus, le :active est optionnel.</li>
              <li class="animation" data-animation="scaleUp">Elément de <strong>liste 3</strong></li>
            </ul>

            <p class="animation" data-animation="fadeIn"><a href="index.php" class="btn">Un lien qui doit apparaitre comme un bouton</a></p>

            <blockquote cite="https://fr.wikiquote.org/wiki/La_Folie_des_grandeurs" class="animation visible" data-animation="pulse">
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