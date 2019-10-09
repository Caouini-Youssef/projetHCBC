<?php
require 'fonctions.php';
start_page('Changer de MDP', 'css/formulaire.css');
?>

    <header class="boxMenu"  >
        <?php home(); ?>
        <p> <h1> CONNEXION </h1></p>
    </header>

    <form class="formulaire" action="connexion_processing.php" method="post">
        <input class="box" placeholder="Adresse-mail" name="mail" type="text"/><br>
        <input class="box" placeholder="Nouveau mot de passe" name="mdp" type="password"/><br>
        <input class="box" value='Valider' type="submit"/> </br>
        <input class="box" type="hidden" name="action" value="mailer" /> </br>
    </form>

<?php
end_page();
?>