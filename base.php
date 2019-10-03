<?php
    /**fonction reliant le site à la BD */
    function database($today, $civ, $mail, $mdp, $nom)
    {

        $dbLink = mysqli_connect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13')
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

        mysqli_select_db($dbLink, 'groupehcbc_projet')
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
        );

        $req = $dbLink->query("SELECT mail FROM user WHERE mail LIKE '$mail'");
        if($req == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $req->fetch_all(PDO::FETCH_ASSOC);

        if($posts != NULL) {
            echo 'E-Mail déjà utilisée !';
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
    function connexion($mail, $mdp)
    {
        $dbLink = mysqli_connect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13')
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

        mysqli_select_db($dbLink, 'groupehcbc_projet')
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
        );

        $query = $dbLink->query("SELECT mail, mdp FROM user WHERE mail LIKE '$mail'");
        if($query == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $query->fetch_all(PDO::FETCH_ASSOC);

        $mailBD = $posts[0][0];
        $mdpBD = $posts [0][1];

        if ($mailBD == $mail) {
            $ver = sha1($mdp);
            if ($ver == $mdpBD) {
                echo 'Connexion réussite !';
            }
            else echo 'Identifiant ou MDP incorrect';
        }
        else echo 'Identifiant ou MDP incorrect';
    }
?>