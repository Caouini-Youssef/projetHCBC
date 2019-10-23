<?php
    $function = new Vfunction();
    $function->start_page('Connexion', '../css/formulaire2.css');
?>

<header class="boxMenu"  >
    <?php $function->home(); ?>
    <p> <h1> CONNEXION </h1></p>
</header>

<form class="formulaire" action="http://groupehcbc.alwaysdata.net/connexion/processing" method="post">
    <input class="box" placeholder="E-Mail" name="mail" type="text"/><br>
    <input class="box" placeholder="mot de passe" name="mdp" type="password"/><br>
    <input class="box" value='Valider' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="mailer" />
</form>

<?php
    $function->end_page();
?>
