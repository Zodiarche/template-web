<?php

$page = "contact.php";
$title = "";
$description = "";

session_start();
?>

<?php require_once "./components/head.php"; ?>

<body>
  <div id="wrapper">
    <?php require_once "./components/header.php" ?>


    <main id="contact">
      <section id="main-section">
        <div class="wrapper">
          <div id="form-container">
            <h1 class="" data-animation="">Contact</h1>

            <form id="form" action="<?php echo $page ?>" method="post">
              <?php
              // if (isset($_GET['send']) && !empty($_GET['send'])) {
              //   if ($_GET['send'] == "contact_success") {
              //     echo '<div class="states success" role="alert" style="text-align: left;"><p>Votre message a bien été envoyé.<br>Nous vous répondrons dans les brefs délais.</p></div>';
              //   }
              // }
              ?>

              <?php
              echo '<div class="states info" role="alert" style="text-align: left;"><p>Ce formulaire n\'est pas relié à une BDD en ligne. Le remplir sert donc à rien, le code est néanmoins prêt à être utilisé.</p></div>';
              ?>

              <?php /* require_once "./components/formulaire/contact.php" */ ?>

              <div id="contact-form" class="grid-field-container">
                <div class="field" class="" data-animation="">
                  <label for="lastname">
                    <input type="text" name="lastname" id="lastname" placeholder="Nom *">
                  </label>
                </div>

                <div class="field" class="" data-animation="">
                  <label for="firstname">
                    <input type="text" name="firstname" id="firstname" placeholder="Prénom *">
                  </label>
                </div>

                <div class="field" class="" data-animation="">
                  <label for="email-contact">
                    <input type="text" name="email-contact" id="email-contact" placeholder="Adresse mail *">
                  </label>
                </div>

                <div class="field" class="" data-animation="">
                  <label for="phone">
                    <input type="tel" name="phone" id="phone" placeholder="Téléphone *">
                  </label>
                </div>
              </div>

              <div class="field" class="" data-animation="">
                <label for="address">
                  <input type="text" name="address" id="address" placeholder="Adresse *">
                </label>
              </div>

              <div id="contact-form" class="grid-field-container">
                <div class="field" class="" data-animation="">
                  <label for="town">
                    <input type="text" name="town" id="town" placeholder="Ville *">
                  </label>
                </div>

                <div class="field" class="" data-animation="">
                  <label for="postal-code">
                    <input type="text" name="postal-code" id="postal-code" placeholder="Code postal *">
                  </label>
                </div>
              </div>

              <div class="field" class="" data-animation="">
                <label for="subject"></label>
                <input type="text" name="subject" id="subject" placeholder="Sujet *">
              </div>

              <div class="field" class="" data-animation="">
                <label for="message">
                  <textarea name="message" id="message" placeholder="Message" rows="10"></textarea>
                </label>
              </div>

              <div class="field" class="" data-animation="">
                <label for="rgpd" class="flex-rgpd-container">
                  <input type="checkbox" id="rgpd" name="rgpd" value="OUI, j'accepte que mes données personnelles soient stockées, traitées et utilisées dans le cadre de la communication qui peut en découler.">
                  Oui, j'accepte que mes données personnelles soient stockées, traitées et utilisées dans le cadre de la communication qui peut en découler.
                </label>
              </div>

              <div class="field txt-center">
                <button id="contact-submit" type="submit" name="form-contact">Envoyer</button>
              </div>

              <div id="recaptcha-container" class="g-recaptcha" data-sitekey="" data-callback="onReCAPTCHASuccess" data-expired-callback="onReCAPTCHAExpired"></div>
            </form>
          </div>
        </div>
      </section>
    </main>
  </div>

  <?php require_once "./components/footer.php"; ?>

  <!-- <script>
    function onReCAPTCHASuccess(token) {
      const submitButton = document.getElementById("contact-submit");
      if (!submitButton) return;

      submitButton.disabled = false;
    }

    function onReCAPTCHAExpired() {
      const submitButton = document.getElementById("contact-submit");
      if (!submitButton) return;

      submitButton.disabled = true;
    }
  </script> -->
</body>

</html>