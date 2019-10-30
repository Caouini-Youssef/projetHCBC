<?php
class CMessage {

    public function __construct(){}

    public function newChat() {
        if(isset($_POST['nom']) AND !empty($_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $msgmax = $_POST['msgmax'];
            $NewDisc = new MDiscussion();
            $action = $_POST['discu'];
            if ($action == 'mailer') {
                $NewDisc->newDiscussion($nom, $msgmax);
                echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/home/connected" />';
            }
            #else echo 'Bouton non géré !';
        }
        else echo 'Veuillez entrer un nom valide !';
    }

    public function showChat() {
        $bdd=new MMessage();
        $bdd->showDiscussions();
    }

    public function newMessage() {
        if(isset($_POST['message']) AND !empty($_POST['message'])) {
            $SafeMessage = htmlspecialchars($_POST['message']);
            include 'base/MMessage.php';
            echo $SafeMessage;
            echo '<meta http-equiv="refresh" content="2;http://groupehcbc.alwaysdata.net/home/connected" />';
        }
        else echo 'Veuillez entrer votre message !';
    }

    public function showMessage() {
        $bdd=new MMessage();
        $bdd->showMessages();
    }

    public function route () {
        $route = new Index();
        $url = $route->getUrl();
        if ($url[1] == 'new_mgs') {
            $this->newMessage();
        }
        elseif ($url[1] == 'new_chat') {
            $this->newChat();
        }
        else echo '<h1> ERREUR 404 </h1>';
    }

}

$msg = new CMessage();
$msg->route();
