<?php

//affiche toute les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Production
//error_reporting(0);

class Functions {
    var $mysqli;

    function connexion($charset = 'utf8') {
        $db_host = 'localhost';
        $db_username = 'abuzz_aquiphoto';
        $db_passwd = '{2Kio[d%;8T{';
        $db_name = 'abuzz_aquiphoto';

        $this->mysqli = new mysqli($db_host, $db_username, $db_passwd, $db_name);

        if($this->mysqli->connect_error) {
            return FALSE;
        }

        $this->mysqli->set_charset($charset);
        return TRUE;
    }


    function close_connexion() {
        $this->mysqli->close();
    }


    function echapper_variable($variable) {
        $element = $this->mysqli->real_escape_string($variable);
        return $element;
    }


    function soumettre_requete($requete) { //retourne un tableau d'enregistrement
        if($resultat = $this->mysqli->query($requete)) {
            $tableau = array();

            while($enregistrement = $resultat->fetch_object()) {
                $tableau[] = $enregistrement;
            }

            return $tableau;
        }
    }


    function soumettre_requete_simple($requete) //retourne un seul enregistrement
    {
        if($resultat = $this->mysqli->query($requete))
        {
            $enregistrement = $resultat->fetch_object();

            return $enregistrement;
        }
    }


    function soumettre_requete_sans_retour($requete) //retourne true ou flase (insertion, update, suppression)
    {
        if($resultat = $this->mysqli->query($requete))
        {
            return $resultat;
        }
    }


    function date_fr($date)
    {
        $date = explode('-',$date);
        return ($date[2].'/'.$date[1].'/'.$date[0]);
    }


    function suppr_accents($chaine)
    {
        $accents = array('À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ');
        $sans = array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y');
        return str_replace($accents, $sans, $chaine);
    }


    function redirection($page)
    {
?>
<script type='text/javascript'>
    window.location="<?php echo $page ?>";
</script>
<?php
    }


    function deconnexion($page)
    {
        session_destroy();

?>
<script type='text/javascript'>
    window.location="<?php echo $page ?>";
</script>
<?php
    }


    function detection_navigateur()
    {
        if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Firefox' ) !== FALSE ) { $navigateur = "firefox"; }
        elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== FALSE ) { $navigateur = "chrome"; }
        elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera' ) !== FALSE ) { $navigateur = "opera"; }
        elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Safari' ) !== FALSE ) { $navigateur = "safari"; }
        elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8' ) !== FALSE ) { $navigateur = "ie8"; }
        elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== FALSE ) { $navigateur = "ie"; }
        else { $navigateur = "navigateur non reconnu"; }

        return $navigateur;
    }


    function couper_paragraphe($chaine, $nb)
    {
        //si le nombre de mot de la chaine est plus petit que le nombre souhaité
        if(str_word_count($chaine) <= $nb) //les caractères accentués sont comptés comme espace
        {
            return $chaine;
        }

        $limit = $nb + 2;
        $tableau = explode(" ", $chaine, $limit);

        $paragraphe = "";

        for($i = 0; $i <= $nb; $i++)
        {
            $paragraphe = $paragraphe.$tableau[$i]." ";
        }

        $paragraphe = $paragraphe."...";

        return $paragraphe;
    }


    function alerte_erreur($site) {
        $headers = 'MIME-Version: 1.0'."\n";
        $headers .= 'Content-type: text/plain; charset="utf-8"'."\n";
        $headers .= 'From: postmaster@agencebuzz.com'."\n";

        $adresse = 'florent@agencebuzz.com';
        $objet = 'ERREUR : '.$site.'';
        $message = 'Bonjour,' ."\n". 'Une erreur est survenue sur le site '.$site.'' ."\n". 'La base de données est HS.';

        mail($adresse, $objet, $message, $headers);
    }


    function verifier_adresse_email($adresse) {
        $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';

        if(preg_match($Syntaxe,$adresse)) {
            return true;
        }

        return false;
    }


    function alerte_message($page, $site) {
        $headers = 'MIME-Version: 1.0'."\n";
        $headers .= 'Content-type: text/plain; charset="utf-8"'."\n";
        $headers .= 'From: postmaster@'.$site.''."\n";

        $adresse = 'florent@agencebuzz.com';
        $objet = 'Nouveau message : '.$site.'';
        $message = 'Bonjour,' ."\n\n". 'Un nouveau message a été envoyé sur le site www.'.$site.'' ."\n". 'Ce message provient du formulaire de '. $page .'.';

        mail($adresse, $objet, $message, $headers);
    }


    function envoyer_notification($prenom, $nom, $adresse_from, $adresse_to, $objet, $message) {
        $headers = 'MIME-Version: 1.0' ."\n";
        $headers .= 'Content-type: text/plain; charset="utf-8"' ."\n";
        $headers .= 'From: '.ucfirst($prenom).' '.ucfirst($nom).' <'.$adresse_from.'>' ."\n";

        mail($adresse_to, $objet, $message, $headers);
    }

    function envoyer_notification_simple( $sender, $adresse_from, $adresse_to, $objet, $message ) {
        $headers = 'MIME-Version: 1.0' ."\n";
        $headers .= 'Content-type: text/plain; charset="utf-8"' ."\n";
        $headers .= 'From: '.$sender.' <'.$adresse_from.'>' ."\n";

        mail($adresse_to, $objet, $message, $headers);
    }

    function envoyer_notification_html($prenom, $nom, $adresse_from, $adresse_to, $objet, $message) {
        $headers = 'MIME-Version: 1.0' ."\n";
        $headers .= 'Content-type: text/html; charset="utf-8"' ."\n";
        $headers .= 'From: '.ucfirst($prenom).' '.ucfirst($nom).' <'.$adresse_from.'>' ."\n";

        mail($adresse_to, $objet, $message, $headers);
    }

    function envoyer_notification_html_simple( $sender, $adresse_from, $adresse_to, $objet, $message) {
        $headers = 'MIME-Version: 1.0' ."\n";
        $headers .= 'Content-type: text/html; charset="utf-8"' ."\n";
        $headers .= 'From: '.$sender.' <'.$adresse_from.'>' ."\n";

        mail($adresse_to, $objet, $message, $headers);
    }

    function envoyer_notification_pj($prenom, $nom, $adresse_from, $adresse_to, $objet, $message, $dossier, $filename) {
        //Génération du séparateur
        $boundary = md5(uniqid(time()));

        $headers = 'MIME-Version: 1.0' ."\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \n";
        $headers .= "X-Priority: 1 \n";
        $headers .= 'From: '.ucfirst($prenom).' '.ucfirst($nom).' <'.$adresse_from.'>' ."\n";
        $headers .= " \n";

        $message_texte = $message;

        $path = $dossier.$filename;
        $type_attachement = filetype($path);
        $attachment = chunk_split(base64_encode(file_get_contents($path)));

        $message  = "--$boundary \n";
        $message .= "Content-Type: text/plain; charset=\"utf-8\" \n";
        $message .= "Content-Transfer-Encoding:8bit \n";
        $message .= "\n";
        $message .= $message_texte;
        $message .= "\n";
        $message .= "--$boundary \n";
        $message .= "Content-Type: $type_attachement; name=\"$filename\" \n";
        $message .= "Content-Transfer-Encoding: base64 \n";
        $message .= "Content-Disposition: attachment; filename=\"$filename\" \n";
        $message .= "\n";
        $message .= $attachment."\n";
        $message .= "\n";
        $message .= "--".$boundary."--";

        mail($adresse_to, $objet, $message, $headers);
    }


    function anti_mail_spam($adresse)
    {
        $encoded = '';

        for ($i=0; $i < strlen($adresse); $i++)
        {
            $encoded .= '&#'.ord(substr($adresse,$i)).';';
        }

        return $encoded;
    }
}