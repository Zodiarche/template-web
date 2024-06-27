<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'library/vendor/autoload.php';

// Affiche toutes les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Production
// error_reporting(0);

class Functions
{
  /**
   * @var mysqli L'objet de connexion MySQLi.
   */
  public $mysqli;

  /**
   * @var string L'hôte de la base de données.
   */
  public $db_host = 'localhost';

  /**
   * @var string Le nom d'utilisateur pour la base de données.
   */
  public $db_username = 'root';

  /**
   * @var string Le mot de passe pour la base de données.
   */
  public $db_passwd = '';

  /**
   * @var string Le nom de la base de données.
   */
  public $db_name = 'template';

  /**
   * Établit une connexion à la base de données MySQL.
   *
   * @param string $charset Le jeu de caractères à utiliser pour la connexion. Par défaut 'utf8'.
   * @return bool TRUE si la connexion est réussie, FALSE sinon.
   */
  function connexion($charset = 'utf8')
  {
    $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_passwd, $this->db_name);

    if ($this->mysqli->connect_error) return false;
    if (!$this->mysqli->set_charset($charset)) return false;

    return true;
  }

  /**
   * Obtient l'objet de connexion MySQLi.
   *
   * @return mysqli|null L'objet de connexion MySQLi si la connexion est établie, NULL sinon.
   */
  function getConnection()
  {
    return $this->mysqli;
  }

  /**
   * Ferme la connexion à la base de données.
   * @return void
   */
  function closeConnection()
  {
    if (!$this->mysqli) return;

    $this->mysqli->close();
  }

  /**
   * Échapper à une variable pour la rendre sûre pour les requêtes SQL.
   *
   * @param string $variable La variable à échapper.
   * @return string La variable échappée.
   */
  function escapeVariable($variable)
  {
    if (isset($this->mysqli) && $this->mysqli instanceof mysqli) {
      return $this->mysqli->real_escape_string($variable);
    } else {
      throw new Exception('La connexion mysqli n\'est pas définie ou invalide.');
    }
  }

  /**
   * Soumettre une requête à la base de données et renvoyer un tableau d'enregistrements.
   *
   * @param string $query La requête SQL à soumettre.
   * @return array Un tableau d'objets représentant les enregistrements de la base de données.
   */
  function submitQuery($query)
  {
    $records = [];

    if ($result = $this->mysqli->query($query)) {
      while ($record = $result->fetch_object()) {
        $records[] = $record;
      }
      $result->free();
    }

    return $records;
  }

  /**
   * Exécuter une requête qui ne renvoie aucun enregistrement (par exemple, INSERT, UPDATE, DELETE).
   *
   * @param string $query La requête SQL à exécuter.
   * @return bool Retourne true si la requête a réussi, sinon false.
   */
  function executeQueryWithoutReturn($query)
  {
    return $this->mysqli->query($query);
  }

  /**
   * Redirection vers la page spécifiée.
   *
   * @param string $page URL de la page vers laquelle rediriger.
   * @return void
   */
  public function redirectTo($page)
  {
    echo "<script type='text/javascript'>window.location = '$page';</script>";
  }

  /**
   * Déconnexion de l'utilisateur et redirection vers une page spécifiée.
   *
   * @param string $page URL de la page vers laquelle rediriger après déconnexion.
   * @return void
   */
  function logoutAndRedirect($page)
  {
    session_destroy();

    echo "<script type='text/javascript'>window.location = '$page';</script>";
  }

  /**
   * Valider une adresse électronique.
   *
   * @param string $email L'adresse e-mail à vérifier.
   * @return bool Retourne true si l'adresse e-mail est valide, sinon false.
   */
  function validate_email_address($email)
  {
    $pattern = '/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/';

    return preg_match($pattern, $email) === 1;
  }

  /**
   * Valider un numéro de téléphone.
   *
   * @param string $phone_number Le numéro de téléphone à vérifier.
   * @return bool Retourne true si le numéro de téléphone est valide, sinon false.
   */
  function validate_phone_number($phone_number)
  {
    $pattern = '/^\+?[\d\s.-]{10,15}$/';

    return preg_match($pattern, $phone_number) === 1;
  }

  /**
   * Configure l'instance de PHPMailer avec les paramètres SMTP.
   *
   * @return PHPMailer Instance de PHPMailer configurée.
   */
  function configure_mailer()
  {
    $mail = new PHPMailer(true);

    // Paramètres du serveur
    $mail->isSMTP();
    $mail->Host       = 'smtp.strato.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'abuzz@agencebuzz.com';
    $mail->Password   = 'LB*748p7N?vT:s.mbN/3';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->CharSet    = 'UTF-8';
    $mail->setLanguage('fr', '/library/vendor/phpmailer/phpmailer/language/');
    $mail->setFrom('abuzz@agencebuzz.com', 'Agence Buzz Santé');

    return $mail;
  }

  /**
   * Ajoute des destinataires à l'instance de PHPMailer.
   *
   * @param PHPMailer $mail Instance de PHPMailer.
   * @param array $recipients Tableau des adresses e-mail des destinataires.
   */
  function add_recipients($mail, $recipients)
  {
    if (empty($recipients) || !is_array($recipients)) return;

    foreach ($recipients as $recipient) {
      $mail->addAddress($recipient);
    }
  }

  /**
   * Ajoute des destinataires en copie à l'instance de PHPMailer.
   *
   * @param PHPMailer $mail Instance de PHPMailer.
   * @param array $copies Tableau des adresses e-mail en copie.
   * @return void
   */
  function add_copies($mail, $copies)
  {
    if (empty($copies) || !is_array($copies)) return;

    foreach ($copies as $copie) {
      $mail->addCC($copie);
    }
  }

  /**
   * Définit le contenu et l'objet de l'e-mail.
   *
   * @param PHPMailer $mail Instance de PHPMailer.
   * @param string $message Contenu du corps de l'e-mail.
   * @param bool $is_user Indicateur pour déterminer l'objet.
   * @return void
   */
  function set_email_content($mail, $message, $is_user)
  {
    $mail->isHTML(true);
    $subject        = $is_user ? "Accusé de Réception" : "Nouveau Message";
    $mail->Subject  = "[Agence Buzz Santé] $subject";
    $mail->Body     = $message;
  }

  /**
   * Envoie un e-mail en utilisant PHPMailer.
   *
   * @param array $recipient Tableau des adresses e-mail des destinataires.
   * @param array $copie Tableau des adresses e-mail en copie.
   * @param string $message Contenu du corps de l'e-mail.
   * @param bool $is_user Indicateur pour déterminer l'objet.
   * @return void
   */
  function send_mail($recipient, $copie, $message, $is_user)
  {
    $mail = $this->configure_mailer();
    $this->add_recipients($mail, $recipient);
    $this->add_copies($mail, $copie);
    $this->set_email_content($mail, $message, $is_user);
    $mail->send();
  }
}
