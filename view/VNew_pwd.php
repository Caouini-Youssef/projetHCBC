<?php
$function = new Vfunction();
$function->start_page('SECURITE', '../css/formulaire.css');
?>
<header>
    <div class="boxFreeNote">
        <?php $function->home(); ?>
    </div>
    <div class="boxMenu">
        <h1> Un E-Mail vous sera envoyé avec un nouveau mot de passe </h1>
    </div>
</header>

<form class="formulaire" action="http://groupehcbc.alwaysdata.net/connexion/new_pwd" method="post">
    <input class="box" placeholder="Email" name="mail" type="text"/>  <br>
    <input class="box" value='Envoyé' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="send" />
</form>
