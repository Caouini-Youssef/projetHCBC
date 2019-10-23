<?php
    require 'fonctions.php';
    require '../base/inscription_base.php';
    start_page('Processing...', 'css/processing.css');
    echo ' <p class="red"> <strong> Redirection... </strong> </p>';

    $action = $_POST ['action'];

    if ($action == 'mailer') {
        $id = $_POST ['id'];
        $civ = $_POST ['civ'];
        $mail = $_POST ['mail'];
        $mdp = $_POST ['mdp'];
        $mdp2 = $_POST ['mdp2'];
        $nom = $_POST ['nom'];

        if ($mdp != $mdp2) {
            echo ' <p class="red"> Veuillez tapez le même mot de passe ! </p>';
            echo '<meta http-equiv="refresh" content="5;URL=inscription.php" />';
            exit;
        }

        database(date('Y-m-d'), $civ, $mail, $mdp, $nom);

        $message = 'Bonjour ' . $nom . ', bienvenue chez FreeNote !' . PHP_EOL .
            'Voici vos identifiants d\'inscription :' . PHP_EOL . PHP_EOL .
            'Mot de passe :' . $mdp . PHP_EOL . PHP_EOL .
            'Email : ' . $mail . PHP_EOL;

        if (mail($mail, 'Inscription FreeNote', $message)) {
            echo '<p class="red"> Votre mail a bien été envoyé ! </p>';
            echo '<meta http-equiv="refresh" content="4;URL=connexion.php" />';
        }
        else
            echo '<br/><strong>Bouton non géré !</strong><br/>';
    }