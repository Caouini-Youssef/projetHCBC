<?php
    $function = new Vfunction();
    $function->start_page('Processing...', '../css/index.css');
    echo 'Redirection...' . PHP_EOL;

    $action = $_POST['action'];

    if ($action == 'mailer') {
        $mdp = $_POST['mdp'];
        $mail = $_POST['mail'];
    }
    else echo 'Bouton non géré !';


    $connect = new MdbConnect();
    $connect->connexion($mail, $mdp);
    $function->end_page();