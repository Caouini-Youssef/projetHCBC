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
            $_SESSION['mail'] = $mail;
        }
        else echo 'Bouton non géré !';
        $connect = new MConnexion();
        $connect->connexion($mail, $mdp);
    }

    public function MdpOublie () {
        $action = $_POST['action'];
        if ($action == 'send') {
            $bdd = new MConnexion();
            $mail = $_POST['mail'];
            $newpwd = random_int(1000, 9999);
            $Safepwd = sha1($newpwd);
            $bdd->recupMdp($mail, $Safepwd);
            $message = 'Bonjour ! Voici votre nouveau mot de passe:' . $newpwd . PHP_EOL . 'Vous pouvez toujours le changer lorsque vous serez connecté !';
            mail($mail, 'Nouveau MDP', $message);
            echo 'Mail envoyé !';
            echo '<meta http-equiv="refresh" content="2;URL=http://groupehcbc.alwaysdata.net/connexion" />';
        }
    }

    public function ChangMdp() {
        $action = $_POST['action'];
        if ($action == 'send') {
            $bdd = new MConnexion();
            $mdp = $_POST['mdp'];
            $Safemdp = sha1($mdp);
            $bdd->changeMdp($Safemdp);
        }
    }

    public function Vrecup() {
        include "view/VChangemdp.php";
    }

    public function Vlost() {
        include "view/VNew_pwd.php";
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
        elseif ($url[1] == 'lost') {
            $this->Vlost();
        }
        elseif ($url[1] == 'new_pwd') {
            $this->MdpOublie();
        }
        elseif ($url[1] == 'recup'){
            $this->Vrecup();
        }
        elseif ($url[1] == 'change'){
            $this->ChangMdp();
        }
        else echo '<h1> ERREUR 404 </h1>';
    }
}


$connecting = new CConnexion();
$connecting->route();