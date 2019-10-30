<?php
require 'fonctions.php';
require '../base/new_discussion_base.php';
start_page('Processing...', 'css/index.css');
echo 'Redirection...' . PHP_EOL;

$action = $_POST ['action'];

if ($action == 'mailer') {
    $title = $_POST['title'];
    $msgMax = $_POST['messageMax'];
}
else echo 'Bouton non géré !';


database(date('Y-m-d'), $title, $msgMax);

end_page();