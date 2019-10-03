<?php
    /**fonction reliant le site à la BD */
    function database($today, $civ, $mail, $mdp, $nom)
    {

        $dbLink = mysqli_connect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13')
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

        mysqli_select_db($dbLink, 'groupehcbc_projet')
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
        );

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

        $query = "SELECT mail FROM user WHERE mail LIKE '$mail'";
        $mdpBD = "SELECT mdp FROM user WHERE mail=" . $mail;
        mysqli_query($dbLink, $query    );
        echo $query;
        if ($query == $mail) {
            $ver = sha1(mysqli_query($dbLink, $query));
            if ($ver == $mdp) {
                echo 'Connexion établie !' . PHP_EOL . 'Redirection...';
            }
            else echo 'mot de passe incorrect !';
        } else echo 'Identifiant incorrect !';
    }
?>