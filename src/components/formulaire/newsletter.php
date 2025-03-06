<?php

$email = $function->escapeVariable($_POST['email-newsletter']);

session_start();
include('library/fonctions.php');
$function = new Functions();

/**
 * Vérifie la connexion et traite le formulaire de contact si les données POST sont présentes.
 */
if ($function->connexion() && isset($_POST) && !empty($_POST)) {
  if (isset($_POST['form-newsletter'])) handleContactForm($function);

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
    return displayMessage("warning", "Veuillez remplir tous les champs obligatoires.");
  }

  if (!$function->validate_email_address($_POST['email-newsletter'])) {
    return displayMessage("warning", "Veuillez indiquer une adresse e-mail valide.");
  }

  $contactData = escapeContactFormData($function);

  if (!verifyEmail($function, $contactData['email-newsletter'])) {
    return displayMessage("warning", "Cette adresse e-mail est déjà inscrite à la newsletter.");
  }

  if (!insertContactData($function, $contactData)) {
    return displayMessage("danger", "Une erreur est survenue, veuillez nous excuser et réessayer plus tard.");
  }

  sendNotifications($function, $contactData);
  $function->redirectTo($page . "?send=newsletter_success");
}

/**
 * Vérifie si le formulaire de contact est valide.
 *
 * @return bool Retourne true si tous les champs obligatoires sont remplis, sinon false.
 */
function isContactFormValid()
{
  $requiredFields = ['email-newsletter'];

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
  $fields = ['email-newsletter'];

  foreach ($fields as $field) {
    $contactData[$field] = $function->escapeVariable($_POST[$field]);
  }

  return $contactData;
}

/**
 * Vérifie si l'email existe déjà dans la base de données.
 *
 * @param Functions $function Instance de la classe Functions.
 * @param string $email L'adresse e-mail à vérifier.
 * @return bool Retourne true si l'email n'existe pas, sinon false.
 */
function verifyEmail($function, $email)
{
  $requete_verification_email =  "SELECT * FROM newsletter WHERE mail = '$email'";
  $result = $function->submitQuery($requete_verification_email);

  return empty($result);
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
    "INSERT INTO `newsletter` (`mail`, `date`)
         VALUES('%s', NOW());",

    $contactData['email-newsletter']
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
  $function->send_mail([$contactData['email-newsletter']], [], $notification_user, true);
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
    "<p>Nouvelle Inscription Newsletter Buzz Santé : %s</p>",

    $contactData['email-newsletter']
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
            <p>Merci de vous êtes inscrit à notre newsletter !</p>
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
  echo "<div class='$class' role='alert'>{$message}</div>";
}
