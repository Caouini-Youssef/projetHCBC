<?php

    /** Fonction qui s'occupe de créer une page html */
    function start_page($title, $css)
    {
        echo'<!DOCTYPE html><html lang="fr"><head><title>'.PHP_EOL.$title.'</title>  <link rel="stylesheet" href="'.PHP_EOL.$css.'" /> </head><body>'.PHP_EOL;
    }

    /** fonction qui permet de clore un page html */
    function end_page()
    {
        echo '</body></html>';
    }

    /** affiche bouton home */
    function home ()
    {
        echo '<a href="index.php"><img src="https://i.imgur.com/vAgpxHQ.png"/>  </a>';
    }

    /** Connexion à la BD */
    function dbConnect($host, $user, $password) {
            $dbLink = mysqli_connect($host, $user, $password)
            or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            return $dbLink;
    }

    /** Connexion à une table spécifique */
    function selectDb ($dbLink, $dbname) {
        mysqli_select_db($dbLink, $dbname)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    }

    function afficherListeDiscussions() {
        $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net','191114','Zhamster13');
        selectDb($dbLink,'groupehcbc_projet');

        $query = $dbLink->query("SELECT nom, id FROM discussion");
        if($query == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $query->fetch_all(PDO::FETCH_ASSOC);
        for ($i = 0; $i < sizeof($posts); $i++)
        {
            $name = $posts[$i][0];
            echo '<option>' . $name . '</option>';
        }
    }
