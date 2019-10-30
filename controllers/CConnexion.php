<?php
class CConnexion {

    public function __construct(){}

    // afficher formulaire
    public function Vconnect() {
        include ('view/VConnexion.php');
    }

    public function Mconnect() {
        include ('base/MConnexion.php');
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
            $this->Mconnect();
        }
        elseif ($url[1] == 'logout') {
            $this->VLogout();
        }
        else echo '<h1> ERREUR 404 </h1>';
    }
}


$connecting = new CConnexion();
$connecting->route();