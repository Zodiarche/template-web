<?php

include('library/fonctions.php');
$function = new Functions();

/**
 * Vérifie la connexion et traite le formulaire de contact si les données POST sont présentes.
 */
if ($function->connexion() && isset($_POST) && !empty($_POST)) {
  if (isset($_POST['form-contact'])) handleContactForm($function);

  $function->closeConnection();
}

/**
 * Gère le traitement du formulaire de contact.
 *
 * @param Functions $function Instance de la classe Functions.
 */
function handleContactForm($function)
{
  if (!isContactFormValid()) {
    $function->redirectTo($page . "#contact");
    return displayMessage("warning", "Veuillez remplir tous les champs obligatoires.");
  }

  if (!$function->validate_email_address($_POST['email-contact'])) {
    $function->redirectTo($page . "#contact");
    return displayMessage(
      "warning",
      "Veuillez indiquer une adresse e-mail valide."
    );
  }

  if (!$function->validate_phone_number($_POST['phone'])) {
    $function->redirectTo($page . "#contact");
    return displayMessage(
      "warning",
      "Veuillez indiquer un numéro de téléphone valide."
    );
  }

  $contactData = escapeContactFormData($function);
  if (!insertContactData($function, $contactData)) {
    $function->redirectTo($page . "#contact");
    return displayMessage(
      "error",
      "Une erreur est survenue, veuillez nous excuser et réessayer plus tard."
    );
  }

  sendNotifications($function, $contactData);
  $function->redirectTo($page . "?send=contact_success#contact");
}

/**
 * Vérifie si le formulaire de contact est valide.
 *
 * @return bool Retourne true si tous les champs obligatoires sont remplis, sinon false.
 */
function isContactFormValid()
{
  $requiredFields = [
    'lastname', 'firstname', 'email-contact', 'phone',
    'address', 'town', 'postal-code', 'subject', 'message', 'rgpd'
  ];

  foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
      return false;
    }
  }

  return true;
}

/**
 * Échappe les données du formulaire de contact.
 *
 * @param Functions $function Instance de la classe Functions.
 * @return array Tableau des données échappées du formulaire de contact.
 */
function escapeContactFormData($function)
{
  $contactData = [];
  $fields = [
    'lastname', 'firstname', 'email-contact', 'phone',
    'address', 'town', 'postal-code', 'subject', 'message', 'rgpd'
  ];

  foreach ($fields as $field) {
    $contactData[$field] = $function->escapeVariable($_POST[$field]);
  }

  return $contactData;
}

/**
 * Insère les données du formulaire de contact dans la base de données.
 *
 * @param Functions $function Instance de la classe Functions.
 * @param array $contactData Tableau des données du formulaire de contact.
 * @return bool Retourne true si l'insertion est réussie, sinon false.
 */
function insertContactData($function, $contactData)
{
  $requete = sprintf(
    "INSERT INTO `contact` (`lastname`, `firstname`, `email-contact`, `phone`, `address`, `town`, `postal-code`, `subject`, `message`, `rgpd`, `date`)
         VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', NOW());",

    $contactData['lastname'],
    $contactData['firstname'],
    $contactData['email-contact'],
    $contactData['phone'],
    $contactData['address'],
    $contactData['town'],
    $contactData['postal-code'],
    $contactData['subject'],
    $contactData['message'],
    $contactData['rgpd']
  );

  return $function->executeQueryWithoutReturn($requete);
}

/**
 * Envoie des notifications par e-mail après le traitement du formulaire de contact.
 *
 * @param Functions $function Instance de la classe Functions.
 * @param array $contactData Tableau des données du formulaire de contact.
 */
function sendNotifications($function, $contactData)
{
  $notification_buzz = generateBuzzNotification($contactData);
  $notification_user = generateUserNotification();

  $function->send_mail(['b.guillemin@agencebuzz.com'], [], $notification_buzz, false);
  $function->send_mail([$contactData['email-contact']], [], $notification_user, true);
}

/**
 * Génère le contenu de la notification pour l'agence Buzz.
 *
 * @param array $contactData Tableau des données du formulaire de contact.
 * @return string Contenu de la notification pour l'agence Buzz.
 */
function generateBuzzNotification($contactData)
{
  return sprintf(
    "<ul>
            <li>Nom : %s</li>
            <li>Prénom : %s</li>
            <li>E-mail : <a href='mailto:%s'>%s</a></li>
            <li>Numéro de téléphone : %s</li>
            <li>Adresse : %s, %s, %s</li>
            <li>Sujet : %s</li>
            <li>Message :<br>%s</li>
        </ul>
        <p><br>---<br>Ce message est généré automatiquement, merci de ne pas y répondre.</p>",

    $contactData['lastname'],
    $contactData['firstname'],
    $contactData['email-contact'],
    $contactData['email-contact'],
    $contactData['phone'],
    $contactData['address'],
    $contactData['town'],
    $contactData['postal-code'],
    $contactData['subject'],
    $contactData['message']
  );
}

/**
 * Génère le contenu de la notification pour l'utilisateur.
 *
 * @return string Contenu de la notification pour l'utilisateur.
 */
function generateUserNotification()
{
  return "<p>Bonjour,</p>
            <p>Nous avons bien reçu vos informations de contact. Nous vous recontacterons au plus vite !</p>
            <p><br>---<br>Ce message est généré automatiquement, merci de ne pas y répondre.</p>";
}

/**
 * Affiche un message d'alerte.
 *
 * @param string $type Type de message (warning ou danger).
 * @param string $message Contenu du message à afficher.
 */
function displayMessage($type, $message)
{
  $class = ($type === "warning") ? "states warning" : "states alert-danger";
  echo "<div class='$class' role='alert'><p>{$message}</p></div>";
}
