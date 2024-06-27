<?php

$page = "sandbox.php";
$title = "";
$description = "";
?>

<?php require_once "./components/head.php"; ?>

<body>
  <div id="wrapper">
    <?php require_once "./components/header.php" ?>

    <main id="sandbox">
      <section id="main-section">
        <div class="wrapper">
          <div class="animation" data-animation="moveToDown">
            <nav class="nav">
              <ul>
                <li><a href="#section-1" class="show-hide-button">Afficher la section numéro 1</a></li>
                <li><a href="#section-2" class="show-hide-button">Afficher la section numéro 2</a></li>
                <li><a href="#section-3" class="show-hide-button">Afficher la section numéro 3</a></li>
                <li><a href="#section-4" class="show-hide-button">Afficher la section numéro 4</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </section>

      <section id="section-1" class="hide animation" data-animation="fadeIn">
        <div class="wrapper">
          <h2>Exemple du fonctionnement du code de read-more.js</h2>
          <p class="read-more-text text-limit">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla neque suscipit dapibus ultrices. Cras pretium, dui at dapibus pulvinar, lacus felis dignissim purus, id pulvinar est magna vitae dolor. Ut sed convallis mauris, semper imperdiet odio. Etiam erat felis, maximus ac nunc at, venenatis bibendum nulla. Curabitur tincidunt eget ipsum euismod ullamcorper. Suspendisse sed diam in mi vulputate convallis quis at sem. Maecenas porta nisl ac enim volutpat, ut dignissim nunc sollicitudin. Donec non maximus felis, in rutrum ipsum. Phasellus tincidunt sapien velit, quis facilisis nisl tristique sit amet. Mauris semper sapien at justo condimentum, at suscipit neque eleifend.

            Mauris euismod purus non leo placerat, eu laoreet metus luctus. In ut augue ut urna finibus fermentum. Aenean lacinia nibh id risus dignissim posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vitae nisi eu augue pellentesque dignissim eu sed dolor. Suspendisse nisi nulla, cursus id sem a, mattis commodo felis. In hac habitasse platea dictumst. Aliquam facilisis tortor nec odio bibendum rhoncus. Integer non massa sem. Nulla ac eleifend neque. Nunc mattis hendrerit leo, vitae gravida augue tristique nec. In aliquam ultrices nunc id accumsan. Sed dui lacus, aliquet ac venenatis at, ultrices et nulla. Sed eu elit a arcu pulvinar laoreet id in ligula. Duis volutpat tempus nulla. Quisque eget porta dui.

            Proin porta justo hendrerit imperdiet varius. Donec ut rutrum ipsum. Sed lacinia, arcu at tempor dapibus, nulla justo volutpat erat, aliquam ultrices tellus nulla sit amet dui. Fusce pellentesque est in lacus ultricies blandit. Fusce ullamcorper eros sit amet dui laoreet, nec fermentum ex luctus. Suspendisse sagittis erat magna, et scelerisque ex congue quis. Phasellus bibendum odio ut lacus accumsan vestibulum. Morbi id cursus orci. Vestibulum eleifend sit amet lacus id gravida. Donec iaculis interdum lorem in porttitor. In non consequat est, id aliquet mauris. Aenean laoreet sem eget diam laoreet, et molestie ex aliquet. Proin rutrum elit quam, suscipit vestibulum turpis bibendum eget. Proin gravida facilisis aliquet.

            Fusce luctus posuere iaculis. Curabitur felis neque, faucibus in imperdiet nec, ullamcorper eget urna. Curabitur tellus nibh, ultricies vel lectus a, lacinia maximus purus. Vivamus mattis neque eu odio porta iaculis. Donec tincidunt augue vel dui viverra tincidunt. Vestibulum tristique, nisi vitae mollis rhoncus, eros mauris commodo erat, vel dignissim purus est non ligula. Etiam molestie magna eget dui condimentum, vitae porta nunc venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In eu volutpat augue. Duis ut turpis egestas, posuere orci sed, viverra ligula. Etiam facilisis scelerisque neque a tincidunt.

            Ut tortor est, malesuada venenatis tincidunt a, mollis at velit. Curabitur posuere orci ac commodo pellentesque. Aliquam sed sem dictum eros maximus elementum. Sed tellus augue, aliquam sed lorem vulputate, dictum lacinia eros. Donec nec tortor sit amet sapien varius facilisis at ut quam. Duis fringilla lectus metus, vel iaculis tortor iaculis vel. Cras congue orci massa, sit amet posuere nisi vestibulum eu. Nam elementum interdum sem nec sagittis. Etiam mi odio, elementum non sagittis et, dignissim ac lorem.
          </p>
          <button class="read-more-button btn" aria-pressed="false" title="Lire la suite">Lire la suite</button>
        </div>
      </section>

      <section id="section-2" class="hide animation" data-animation="fadeIn">
        <div class="wrapper">
          <h2>Exemple de code d'une FAQ</h2>

          <details>
            <summary>Où trouver un installateur RGE ?</summary>

            <div>
              <p>Vous pouvez trouver votre installateur sur l’annuaire des professionnels RGE sur France Rénov’</p>
            </div>
          </details>

          <details>
            <summary>Est-ce qu’il vaut mieux un seul onduleur ou des micro-onduleurs ?</summary>

            <div></div>
          </details>
          <details>
            <summary>Est-ce rentable d’installer des panneaux photovoltaïques ?</summary>

            <div></div>
          </details>
          <details>
            <summary>Quelles sont les aides financières pour l’installation de panneaux photovoltaïques ?</summary>

            <div></div>
          </details>
          <details>
            <summary>Quel est le prix de vente de la production d’électricité photovoltaïque ?</summary>

            <div></div>
          </details>
          <details>
            <summary>Je veux consommer ma propre électricité, comment faire ?</summary>

            <div></div>
          </details>
          <details>
            <summary>Comment réduire ma facture d’électricité ? Est-ce qu’installer des panneaux photovoltaïques est la bonne solution ?</summary>

            <div></div>
          </details>
          <details>
            <summary>Est-ce que je peux utiliser ma production d’électricité photovoltaïque en cas de coupure d’électricité ?</summary>

            <div></div>
          </details>
        </div>
      </section>

      <section id="section-3" class="hide animation" data-animation="fadeIn">
        <div class="wrapper">
          <p>Section 3</p>
        </div>
      </section>

      <section id="section-4" class="hide animation" data-animation="fadeIn">
        <div class="wrapper">
          <p>Section 4</p>
        </div>
      </section>
    </main>
  </div>

  <?php require_once "./components/footer.php"; ?>
</body>

</html>