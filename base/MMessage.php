<?php
    class MMessage
    {

        /** Affiche la liste des discussions */
        public function ShowDiscussions()
        {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $allChat = $dbLink->query('SELECT * FROM discussion');
            while ($msg = $allChat->fetch()) {
                ?>
                <a target="_blank" href="http://groupehcbc.alwaysdata.net/discussion/chat/<?php echo $msg['id_chat'] ?>" class="chat"> <?php echo $msg['nom']; ?>( Messages max:
                <?php echo $msg['msgmax'].' ) </br>'; ?> </a>
                <?php
            }
        }

        /** Créer une nouvelle discussion dans la base de données */
        public function newDiscussion ($nom, $msgmax) {
            $bd = new MdbConnect();
            $today = date('Y-m-d');
            $dbLink = $bd->dbConnect();
            $query = $dbLink->prepare('INSERT INTO discussion (date, nom, msgmax) VALUES (?, ?, ?)');
            $query->execute(array($today, $nom, $msgmax));
        }

        public function GetURL($x) {
            $url = '';
            if (isset($_GET['url'])) {
                $url = explode('/', $_GET['url']);
            }
            return $url[$x];
        }

        /** Récupère les messages depuis la base de données */
        public function ShowMessages()
        {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $id_chat= $this->GetURL(2);
            $_SESSION['idChat'] = $id_chat;
            $allMsg = $dbLink->query ('SELECT * FROM message WHERE message.id_chat="'. $id_chat . '"');
            return $allMsg;
        }

        /** Créer un nouveau message */
        public function newMessage ($message, $id_chat) {
            $bd = new MdbConnect();
            if (empty(!$message)) {
                $today = date('Y-m-d');
                $pseudo = $_SESSION['nom'];
                $dbLink = $bd->dbConnect();
                $query = $dbLink->prepare('INSERT INTO message (date, texte, createur, id_chat) VALUES (?, ?, ?, ?)');
                $query->execute(array($today, $message, $pseudo, $id_chat));
            }
            else echo 'Message non valide !';
        }
    }