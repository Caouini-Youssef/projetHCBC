<?php
class CMessage {

    /** Créer une nouvelle discussion */
    public function newChat() {
        if(isset($_POST['nom']) AND !empty($_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $msgmax = $_POST['msgmax'];
            $NewDisc = new MMessage();
            $action = $_POST['discu'];
            if ($action == 'mailer') {
                $NewDisc->newDiscussion($nom, $msgmax);
                echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/home/connected" />';
            }
        }
        else echo 'Veuillez entrer un nom valide !';
    }

    /** Clos et créer un nouveau message */
    public function newMessage()
    {
        $id_chat = $_SESSION['idChat'];
        $action = $_POST['closer'];
        if ($action == 'ferme') {
            $bdd = new MMessage();
            $bdd->newMessage($id_chat);
            echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/discussion/chat/'. $_SESSION['idChat'] .'"/>';
        }
    }

    /** Affiche tout les messages */
    public function showMsg() {
        $bdd = new MMessage();
        $allMsg = $bdd->ShowMessages();
        while ($msg = $allMsg->fetch()) {
            ?>
            <b class="Msg"> <?php echo $msg['createur']; ?> :
                <?php echo $msg['texte'] .'</br>';
                $_SESSION['idMsg']=$msg['id'];
            ?> </b> <?php
        }
    }

    public function deleteMsg () {
        $bdd = new MMessage();
        $bdd->deleteMsg($_SESSION['idMsg']);
    }

    /** Permet de rajouter des mots dans un message */
    public function UpdMsg() {
            $id_chat = $_SESSION['idChat'];
            $action = $_POST['action'];
            if ($action == 'msg') {
                if (isset($_POST['message']) AND !empty($_POST['message'])) {
                    $message = htmlspecialchars($_POST['message']);
                    $mots = explode(' ', $message);
                    if (count($mots)>3) {
                        echo 'Tu ne peux écrire que 2 mots max ! Redirection...';
                        echo '<meta http-equiv="refresh" content="3;http://groupehcbc.alwaysdata.net/discussion/chat/'. $_SESSION['idChat'] .'"/>';
                        die;
                    }
                    $bdd = new MMessage();
                    $bdd->updateMessage($id_chat, $message);
                    echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/discussion/chat/'. $_SESSION['idChat'] .'"/>';
                } else echo 'Veuillez entrer votre message !';
            }
        }

    /** root */
    public function route () {
        $route = new Index();
        $url = $route->getUrl();
        if ($url[1] == 'new_mgs') {
            $this->UpdMsg();
        }
        elseif ($url[1] == 'close') {
            $this->newMessage();
        }
        elseif ($url[1] == 'new_chat') {
            $this->newChat();
        }
        elseif ($url[1] == 'chat') {
            include 'view/VChat.php';
        }
        elseif ($url[1] == 'del') {
            $this->deleteMsg();
        }
        else echo '<h1> ERREUR 404 </h1>';
    }

}

$msg = new CMessage();
$msg->route();
