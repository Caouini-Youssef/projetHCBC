<?php
class MInscription
{
    /** Fonction reliant les inscriptions à la BD */
    public function inscription($today, $civ, $mail, $mdp, $nom)
    {
        $bd = new MdbConnect();
        $dbLink = $bd->dbConnect();

        $req = $dbLink->query("SELECT mail FROM user WHERE mail LIKE '$mail'");
        if ($req == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $req->fetchAll(PDO::FETCH_ASSOC);

        if ($posts != NULL or filter_var($posts, FILTER_VALIDATE_EMAIL)) {
            echo 'E-Mail déjà utilisé ou incorrect !';
            echo '<meta http-equiv="refresh" content="3;URL=http://groupehcbc.alwaysdata.net/inscription" />';
            exit;
        }

        $mdpSHA = sha1($mdp);


        $query = $dbLink->prepare('INSERT INTO user (date, mail, civilite, mdp, nom) VALUES (?, ?, ?, ?, ?)');
        $query->execute(array($today, $mail, $civ, $mdpSHA, $nom));
    }
}