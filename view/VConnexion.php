<?php
    $function = new Vfunction();
    $function->start_page('Connexion', '../css/formulaire.css');
?>

<header>
    <div class="boxFreeNote">
        <?php $function->home(); ?>
    </div>
    <div class="boxMenu">
        <h1> CONNEXION </h1>
    </div>
</header>

<form class="formulaire" action="http://groupehcbc.alwaysdata.net/connexion/processing" method="post">
    <input class="box" value="<?php echo $_COOKIE['login'] ?>" placeholder="Email" name="mail" type="text"/><br>
    <input class="box" value="<?php echo $_COOKIE['pwd'] ?>" placeholder="mot de passe" name="mdp" type="password"/><br>
    <input class="box" value='Valider' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="mailer" />
    <a href="http://groupehcbc.alwaysdata.net/connexion/lost"> Mot de passe oublié ?</a>
</form>

<?php
    $function->end_page();
?>
