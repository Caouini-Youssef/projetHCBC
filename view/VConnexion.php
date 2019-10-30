<?php
    $function = new Vfunction();
    $function->start_page('Connexion', '../css/formulaire2.css');
?>

<header class="boxMenu"  >
    <?php $function->home(); ?>
    <h1> CONNEXION </h1>
</header>
<hr/>
<form class="formulaire" action="http://groupehcbc.alwaysdata.net/connexion/processing" method="post">
    <input class="box" value="<?php echo $_COOKIE['login'] ?>" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" name="mail" type="text"/><br>
    <input class="box" value="<?php echo $_COOKIE['pwd'] ?>" placeholder="mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'mot de passe'" name="mdp" type="password"/><br>
    <input class="box" value='Valider' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="mailer" />
</form>

<?php
    $function->end_page();
?>
