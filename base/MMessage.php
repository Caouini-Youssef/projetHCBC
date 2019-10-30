<?php
    class MMessage
    {
        /** Affiche la liste des discussions */
        public function ShowDiscussions()
        {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();

            $allmsg = $dbLink->query('SELECT * FROM discussion');
            while ($msg = $allmsg->fetch()) {
                ?>
                <a href="" class="chat"> <?php echo $msg['nom']; ?>( Messages max:
                <?php echo $msg['msgmax'].' ) </br>'; ?> </a>
                <?php
            }
        }

        public function newDiscussion ($nom, $msgmax) {
            $bd = new MdbConnect();
            $today = date('Y-m-d');
            $dbLink = $bd->dbConnect();
            $query = $dbLink->prepare('INSERT INTO discussion (date, nom, msgmax) VALUES (?, ?, ?)');
            $query->execute(array($today, $nom, $msgmax));
        }

        public function newMessage ($message) {
            $bd = new MdbConnect();
            $today = date('Y-m-d');
            $pseudo = $_SESSION['nom'];
            $dbLink = $bd->dbConnect();
            $id_chat = $dbLink->query('SELECT id_chat FROM message M JOIN discussion D ON id_chat.M=id_chat.D WHERE id_chat.M=id_chat.D');

            $query = $dbLink->prepare('INSERT INTO message (date, texte, createur, id_chat) VALUES (?, ?, ?, ?)');
            $query->execute(array($today, $message, $pseudo, $id_chat));
        }


        /** Affiche les messages */
        public function ShowMessages()
        {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $allmsg = $dbLink->query('SELECT * FROM message');
            while ($msg = $allmsg->fetch()) {
                ?>
                <b class="Msg"> <?php echo $msg['createur']; ?> :
                    <?php echo $msg['texte'] . '</br>'; ?> </b>
                <?php
            }
        }
    }

    $chat=new MMessage();
    $chat->newMessage($_POST['SafeMessage']);