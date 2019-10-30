<?php
    session_start();
    class Index {

        function __construct() {}

        public function getUrl () {
            $url = '';
            if (isset($_GET['url'])) {
                $url = explode('/', $_GET['url']);
            }
            return $url;
        }

        public function redirect() {
            $url = $this->getUrl();
            #home
            if ($url[0] == 'home' || $url[0] == '') {
                include 'controllers/CDefault.php';
            }
            #connexion
            elseif ($url[0] == 'connexion') {
                include 'controllers/CConnexion.php';
            }
            #inscription
            elseif ($url[0] == 'inscription') {
                include 'controllers/CInscription.php';
            }
            elseif ($url[0] == 'discussion') {
                include 'controllers/CMessage.php';
            }
            else echo '<h1> ERREUR 404 </h1>';
        }

    }

    #Autoload les differents fichiers
    spl_autoload_register(function ($class_name) {
        if ($class_name[0] === 'Index')
            require '/' . $class_name . '.php';
        if ($class_name[0] === 'C')
            require 'controllers/' . $class_name . '.php';
        if ($class_name[0] === 'V')
            require 'view/' . $class_name . '.php';
        if ($class_name[0] === 'M')
            require 'base/' . $class_name . '.php';
    });

    $root = new Index();
    $root->redirect();

