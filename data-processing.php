<?php

    function inscription()
    {
        $action = $_POST['action'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($action == 'mailer') {
            $message = 'Voici vos id d\'inscription :' . PHP_EOL;
            $message .= 'Email : ' . $email . PHP_EOL;
            $message .= 'Mot de passe : ' . PHP_EOL . $password;

            mail($email,'Inscription FreeNote', $email);
            echo 'Votre mail a bien été envoyé <br>';
        }
        else
        {
            echo '<br><strong>Bouton non géré ! </strong><br/>';
        }
    }

?>