<?php
include 'base/MdbConnect.php';
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
    }



    $function = new Vfunction();
    $function->start_page('Processing...', '../css/index.css');
    echo 'Redirection...' . PHP_EOL;
    $time = time()+60*60*24;

    $action = $_POST['action'];

    if ($action == 'mailer') {
        $mdp = $_POST['mdp'];
        $mail = $_POST['mail'];
        setcookie("login", "$mail", $time, null, null, false, true);
        setcookie("pwd", "$mdp", $time, null, null, false, true);
    }
    else echo 'Bouton non géré !';


    $connect = new MConnexion();
    $connect->connexion($mail, $mdp);
    $function->end_page();