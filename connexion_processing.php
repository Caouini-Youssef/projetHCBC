<?php
require 'fonctions.php';
require 'base.php';
start_page('Processing...', 'css/index.css');
echo '<meta http-equiv="refresh" content="4;URL=index.php" />';
echo 'Redirection...' . PHP_EOL;

$action = $_POST ['action'];

if ($action == 'mailer') {
    $mdp = $_POST['mdp'];
    $mail = $_POST['mail'];
}
else echo 'Bouton non géré !';

connexion($mail, $mdp);

end_page();
?>