<?php

    class MConnexion
    {
        /** Fonction permettant la connexion d'un utilisateur */
        public function connexion($mail, $mdp)
        {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();

            $query = $dbLink->query("SELECT mail, mdp, nom FROM user WHERE mail LIKE '$mail'");
            if ($query == FALSE) {
                die ('Erreur SQL');
            }
            $posts = $query->fetch();

            $mailBD = $posts['mail'];
            $mdpBD = $posts ['mdp'];
            $nom = $posts ['nom'];


            if ($mailBD == $mail) {
                $ver = sha1($mdp);
                if ($ver == $mdpBD) {
                    session_start();
                    $_SESSION['nom'] = $nom;
                    $_SESSION['mdp'] = $_POST ['mdp'];
                    echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/home/connected" />';
                } else {
                    echo 'Identifiant ou MDP incorrect';
                    echo '<meta http-equiv="refresh" content="3;URL=http://groupehcbc.alwaysdata.net/connexion" />';
                }
            } else {
                echo 'Identifiant ou MDP incorrect';
                echo '<meta http-equiv="refresh" content="3;URL=http://groupehcbc.alwaysdata.net/connexion" />';
            }
        }

        public function recupMdp ($mail, $mdp)
        {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();

            $req = $dbLink->query("SELECT mail FROM user WHERE mail LIKE '$mail'");
            if ($req == FALSE) {
                die ('Erreur SQL');
            }
            $posts = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($posts = null) {
                echo 'Adresse mail non valide ! ';
                echo '<meta http-equiv="refresh" content="4;URL=http://groupehcbc.alwaysdata.net/connexion" />';
                die;
            }
            $dbLink->exec('UPDATE user SET mdp = "'. $mdp .'" WHERE mail = "'. $mail .'"');
        }

        public function changeMdp ($mdp) {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $dbLink->exec('UPDATE user SET mdp = "'. $mdp .'" WHERE mail ="'. $_SESSION['mail'] .'"');
            echo '<meta http-equiv="refresh" content="0;URL=http://groupehcbc.alwaysdata.net/home/connected" />';
        }
    }
