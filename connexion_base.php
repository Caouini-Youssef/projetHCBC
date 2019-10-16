<?php

    /** Fonction permettant la connexion d'un utilisateur */
    function connexion($mail, $mdp)
    {
        $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net','191114','Zhamster13');

        selectDb($dbLink, 'groupehcbc_projet');

        $query = $dbLink->query("SELECT mail, mdp, nom FROM user WHERE mail LIKE '$mail'");
        if($query == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $query->fetch_all(PDO::FETCH_ASSOC);

        $mailBD = $posts[0][0];
        $mdpBD = $posts [0][1];
        $nom = $posts [0][2];


        if ($mailBD == $mail) {
            $ver = sha1($mdp);
            if ($ver == $mdpBD) {
                echo 'Connexion réussite !';
                session_start();
                $_SESSION['nom'] = $nom;
                $_SESSION['mdp'] = $_POST ['mdp'];
                echo '<meta http-equiv="refresh" content="2;URL=page_membre.php" />';
            }
            else {
                echo 'Identifiant ou MDP incorrect';
                echo '<meta http-equiv="refresh" content="4;URL=index.php" />';
            }
        }
        else {
            echo 'Identifiant ou MDP incorrect';
            echo '<meta http-equiv="refresh" content="4;URL=index.php" />';
        }
    }
