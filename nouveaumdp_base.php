<?php
    require 'fonctions.php';

    function recupMdp ($mail)
    {

        $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13');

        selectDb($dbLink, 'groupehcbc_projet');

        $req = $dbLink->query("SELECT mail FROM user WHERE mail LIKE '$mail'");
        if ($req == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $req->fetch_all(PDO::FETCH_ASSOC);

        if ($posts = NULL) {
            echo 'Adresse mail non valide ! ';
        }
        else {
            $NewPassword = RandomString();
            $pwdSha = sha1($NewPassword);

            $query = 'INSERT mdp INTO user VALUES 
        ("' . $pwdSha. '")';
        }
    }