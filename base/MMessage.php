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
                $req = $dbLink->query ('SELECT id FROM message WHERE id_chat = "'. $msg['id_chat'] .'"');
                $allMsg = count($req->fetchAll());
                ?>
                <a target="_blank" href="http://groupehcbc.alwaysdata.net/discussion/chat/<?php echo $msg['id_chat']; ?>" class="chat"> <?php echo $msg['nom']; ?>( Messages:
                <?php echo $allMsg . '/'. $msg['msgmax'].' ) </br>'; ?> </a>
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
            $allMsg = $dbLink->query ('SELECT * FROM message WHERE id_chat="'. $id_chat . '"');
            return $allMsg;
        }

        /** Créer un nouveau message */
        public function newMessage ($id_chat) {
            if (empty($_SESSION['nom'])){
                echo"Vous n'êtes pas connecté !";
                echo '<meta http-equiv="refresh" content="2;http://groupehcbc.alwaysdata.net/connexion/>';
                die;
            }
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $maxtab = $dbLink->query('SELECT msgmax FROM discussion WHERE id_chat="'. $id_chat .'"');
            $reqq = $maxtab->fetch();
            $max = $reqq['msgmax'];
            $req = $dbLink->query('SELECT id FROM message WHERE id_chat="'. $id_chat .'"');
            $allMsg = count($req->fetchAll());
            if ($max <= $allMsg) {
                echo"La discussion est arrivé a terme ! Nombre de message max atteint !";
                echo '<meta http-equiv="refresh" content="2;http://groupehcbc.alwaysdata.net/connexion/>';
                die;
            }
            $message = ' ';
            $query = $dbLink->prepare('INSERT INTO message (date, texte, id_chat) VALUES (?, ?, ?)');
            $query->execute(array(date('Y-m-d'), $message, $id_chat));
        }

        public function updateMessage($id_chat, $NewMessage) {
            if (empty($_SESSION['nom'])){
                echo"Vous n'êtes pas connecté !";
                echo '<meta http-equiv="refresh" content="2;http://groupehcbc.alwaysdata.net/connexion/>';
                die;
            }
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $query2 = $dbLink->query('SELECT id FROM message WHERE id_chat="'. $id_chat .'"');
            $posts = $query2->fetchAll(PDO::FETCH_COLUMN, 0);
            $idMax = end($posts);
            $query = $dbLink->query('SELECT texte, id, createur FROM message WHERE id_chat="'. $id_chat .'" AND id = "'. $idMax .'"');
            $result = $query->fetch();
            $creat = $result['createur'];
            $creaters = explode(' ', $creat);
            if (in_array($_SESSION['nom'], $creaters)) {
                echo "Vous ne pouvez modifier qu'une seule fois un message !";
                echo '<meta http-equiv="refresh" content="3;http://groupehcbc.alwaysdata.net/discussion/chat/' . $_SESSION['idChat'] . '"/>';
                die;
            }
            $creats = $_SESSION['nom'] .' / '. $creat;
            $text = $result['texte'] . $NewMessage;
            $dbLink->query('UPDATE message SET texte="'. $text .'", createur ="'. $creats .'" WHERE id = "'. $result['id'] .'"');
        }

        public function deleteMsg ($id) {
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $dbLink->exec('DELETE FROM message WHERE id ="'. $id .'"');
            echo '<meta http-equiv="refresh" content="0;http://groupehcbc.alwaysdata.net/discussion/chat/'. $_SESSION['idChat'] .'"/>';
        }
    }