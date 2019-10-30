<?php
    class CInscription {

        public function Inscription() {
            $action = $_POST['action'];

            if ($action == 'mailer') {
                $mdp = $_POST['mdp'];
                $mail = $_POST['mail'];
                $nom = $_POST['nom'];
                $mdp2 = $_POST['mdp2'];
                $civ = $_POST['civ'];

                if ($mdp != $mdp2) {
                    echo ' <p class="red"> Veuillez tapez le même mot de passe ! </p>';
                    echo '<meta http-equiv="refresh" content="3;URL=http://groupehcbc.alwaysdata.net/inscription" />';
                    exit;
                }

                $connect = new MInscription();
                $connect->inscription(date('Y-m-d'), $civ, $mail, $mdp, $nom);

                $message = 'Bonjour ' . $nom . ', bienvenue chez FreeNote !' . PHP_EOL .
                    'Voici vos identifiants d\'inscription :' . PHP_EOL . PHP_EOL .
                    'Mot de passe :' . $mdp . PHP_EOL . PHP_EOL .
                    'Email : ' . $mail . PHP_EOL;

                if (mail($mail, 'Inscription FreeNote', $message)) {
                    echo '<p class="red"> Votre mail a bien été envoyé ! Bienvenue chez FreeNote !</p>';
                    echo '<meta http-equiv="refresh" content="4;URL=http://groupehcbc.alwaysdata.net/connexion" />';
                }
                else echo '<br/><strong>Inscription impossible !</strong><br/>';

            }
        }

        # Afficher formulaire
        public function Vconnect () {
            include ('view/VInscription.php');
        }

        public function route () {
            $route = new Index();
            $url = $route->getUrl();
            if ($url[1] == '') {
                $this->Vconnect();
            }
            elseif ($url[1] == 'processing') {
                $this->Inscription();
            }
            else echo '<h1> ERREUR 404 </h1>';
        }
    }


    $sign = new CInscription();
    $sign->route();
