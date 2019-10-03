<?php
    require 'fonctions.php';
    require 'base.php';
    start_page('Processing...', 'CSS/index.css');
    echo '<meta http-equiv="refresh" content="4;URL=connexion.php" />';
    echo 'Redirection...';

    $action = $_POST ['action'];

    if ($action == 'mailer') {
        $id = $_POST ['id'];
        $civ = $_POST ['civ'];
        $mail = $_POST ['mail'];
        $mdp = $_POST ['mdp'];
        $mdp2 = $_POST ['mdp2'];
        $nom = $_POST ['nom'];

        database(date('Y-m-d'), $civ, $mail, $mdp, $nom);

        $message = 'Bonjour ' . $nom . ', bienvenue chez FreeNote !' . PHP_EOL .
            'Voici vos identifiants d\'inscription :' . PHP_EOL . PHP_EOL .
            'Mot de passe :' . $mdp . PHP_EOL . PHP_EOL .
            'Email : ' . $mail . PHP_EOL;

        if (mail($mail, 'Inscription FreeNote', $message))
            echo 'Votre mail a bien été envoyé !';
        else
            echo '<br/><strong>Bouton non géré !</strong><br/>';
    }
?>