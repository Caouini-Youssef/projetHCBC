<?php

    class MdbConnect
    {

        public function __construct() {}

        /** Connexion à la BD */
        public function dbConnect($host, $user, $password)
        {
            $dbLink = mysqli_connect($host, $user, $password)
            or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            return $dbLink;
        }


        /** Connexion à une table spécifique */
        public function selectDb($dbLink, $dbname)
        {
            mysqli_select_db($dbLink, $dbname)
            or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
        }


        /** Fonction permettant la connexion d'un utilisateur */
        public function connexion($mail, $mdp)
        {

            $dbLink = $this->dbConnect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13');

            $this->selectDb($dbLink, 'groupehcbc_projet');

            $query = $dbLink->query("SELECT mail, mdp, nom FROM user WHERE mail LIKE '$mail'");
            if ($query == FALSE) {
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
                    echo '<meta http-equiv="refresh" content="2;http://groupehcbc.alwaysdata.net/home/connected" />';
                } else {
                    echo 'Identifiant ou MDP incorrect';
                    echo '<meta http-equiv="refresh" content="4;URL=http://groupehcbc.alwaysdata.net/connexion" />';
                }
            } else {
                echo 'Identifiant ou MDP incorrect';
                echo '<meta http-equiv="refresh" content="4;URL=http://groupehcbc.alwaysdata.net/connexion" />';
            }
        }

        /**fonction reliant les inscription à la BD */
        public function dbSign($today, $civ, $mail, $mdp, $nom)
        {
            $dbLink = $this->dbConnect('mysql-groupehcbc.alwaysdata.net','191114','Zhamster13');

            $this->selectDb($dbLink, 'groupehcbc_projet');

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


        /** Affiche la liste des discussions */
        public function afficherListeDiscussions()
        {
            $dbLink = $this->dbConnect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13');
            $this->selectDb($dbLink, 'groupehcbc_projet');

            $query = $dbLink->query("SELECT nom, id FROM discussion");
            if ($query == FALSE) {
                die ('Erreur SQL');
            }
            $posts = $query->fetch_all(PDO::FETCH_ASSOC);
            for ($i = 0; $i < sizeof($posts); $i++) {
                $name = $posts[$i][0];
                echo '<option>' . $name . '</option>';
            }
        }


        /** Affiche la liste des messages */
        public function afficherListeMessages()
        {
            $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net', '191114', 'Zhamster13');
            selectDb($dbLink, 'groupehcbc_projet');

            $query = $dbLink->query("SELECT texte, auteur FROM message WHERE id=1");
            if ($query == FALSE) {
                die ('Erreur SQL');
            }
            $posts = $query->fetch_all(PDO::FETCH_ASSOC);
            $texte = $posts[0][0];
            echo '<option>' . $texte . '</option>';
        }
    }