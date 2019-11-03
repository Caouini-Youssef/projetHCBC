<?php
class CDefault {

    // afficher formulaire
    public function home() {
        include ('view/Vdefault.php');
    }

    public function connect() {
        include ('view/VPage_membre.php') ;
    }

    public function showUser() {
        $bdd=new MAdmin();
        $query = $bdd->showUser();
        while ($user= $query->fetch())
        {
            ?>
            <div class="chat">
            <?php echo $user['nom'].' - ';
            echo $user['mail'].'</br>'; ?> </div>
            <?php
        }
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
        elseif ($url[1] == 'admin') {
            include ('view/VAdmin.php');
        }
        else echo '<h1> ERREUR 404 </h1>';
    }
}

$redirect = new CDefault();
$redirect->route();
