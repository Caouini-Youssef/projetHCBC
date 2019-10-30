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

    public function showChat () {
        $bdd = new MMessage();
        $allChat = $bdd->ShowChat();
        while ($msg = $allChat->fetch()) {
            ?>
            <a target="_blank" href="http://groupehcbc.alwaysdata.net/discussion/chat/<?php echo $msg['id_chat'] ?>"
               class="chat"> <?php echo $msg['nom']; ?>( Messages max:
                <?php echo $msg['msgmax'] . ' ) </br>'; ?> </a>
            <?php
        }
    }

    public function newMessage()
    {
        $id_chat = $_SESSION['idChat'];
        $action = $_POST['action'];
        if ($action == 'msg') {
           if (isset($_POST['message']) AND !empty($_POST['message'])) {
                $SafeMessage = htmlspecialchars($_POST['message']);
                $bdd = new MMessage();
                $bdd->newMessage($SafeMessage, $id_chat);
                echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/discussion/chat/'. $_SESSION['idChat'] .'"/>';
           } else echo 'Veuillez entrer votre message !';
        }
    }

    public function showMsg() {
        $bdd = new MMessage();
        $allMsg = $bdd->ShowMessages();
        while ($msg = $allMsg->fetch()) {
            ?>
            <b class="Msg"> <?php echo $msg['createur']; ?> :
                <?php echo $msg['texte'] . '</br>'; ?> </b>
            <?php
        }
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
        elseif ($url[1] == 'chat') {
            include 'view/VChat.php';
        }
        else echo '<h1> ERREUR 404 </h1>';
    }

}

$msg = new CMessage();
$msg->route();
