<?php
    require 'fonctions.php';
    start_page('Connexion', 'CSS/formulaire.css');
?>

<header>
    <p> <h1> CONNEXION </h1></p>
</header>

<form class="formulaire" action="connexion_processing.php" method="post">
    <input class="box" placeholder="Identifiant" name="mail" type="text"/><br>
    <input class="box" placeholder="mot de passe" name="mdp" type="password"/><br>
    <input class="box" value='Valider' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="mailer" />
</form>

<?php
    end_page();
?>
