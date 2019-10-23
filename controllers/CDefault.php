<?php
class CDefault {

    public function __construct(){}

    // afficher formulaire
    public function home() {
        include ('view/Vdefault.php');
    }

    public function connect() {
        include ('view/VPage_membre.php') ;
    }

    public function route() {
        $route = new Index();
        $url = $route->getUrl();
        if ($url[1] == '') {
            $this->home();
        }
        elseif ($url[1] == 'connected') {
            $this->connect();
        }
        else echo '<h1> ERREUR 404 </h1>';
    }
}

$redirect = new CDefault();
$redirect->route();
