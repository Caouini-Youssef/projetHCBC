<?php
include 'base/MdbConnect.php';
class MInscription extends MdbConnect
{
    /**fonction reliant les inscription à la BD */
    public function dbSign($today, $civ, $mail, $mdp, $nom)
    {
        $dbLink = $this->getBd();

        $req = $dbLink->query("SELECT mail FROM user WHERE mail LIKE '$mail'");
        if($req == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $req->fetch_all(PDO::FETCH_ASSOC);

        if($posts != NULL) {
            echo 'E-Mail déjà utilisé !';
            echo '<meta http-equiv="refresh" content="5;URL=inscription.php" />';
            exit;
        }

        $mdpsha = sha1($mdp);

        $query = 'INSERT INTO user (date, mail, civilite, mdp, nom) VALUES 
        ("' . $today . '", \'' . $mail . '\', \'' . $civ . '\', \'' . $mdpsha . '\',\'' . $nom . '\')';


        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

}