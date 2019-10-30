<?php
class CConnexion {

    public function Connexion() {
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
    }

    // afficher formulaire
    public function Vconnect() {
        include ('view/VConnexion.php');
    }

    public function VLogout() {
        include ('view/VLogout.php');
    }

    public function route () {
        $route = new Index();
        $url = $route->getUrl();
        if ($url[1] == '') {
            $this->Vconnect();
        }
        elseif ($url[1] == 'processing') {
            $this->Connexion();
        }
        elseif ($url[1] == 'logout') {
            $this->VLogout();
        }
        else echo '<h1> ERREUR 404 </h1>';
    }
}


$connecting = new CConnexion();
$connecting->route();