<?php
    $function = new Vfunction();
    $function->start_page('Changement', '../css/formulaire.css');
?>

<header>
    <div class="boxFreeNote">
        <h2><a href="http://groupehcbc.alwaysdata.net/home/connected">BACK</a></h2>
    </div>
    <div class="boxMenu">
        <h1> Changer de MDP </h1>
    </div>
</header>

<form class="formulaire" action="http://groupehcbc.alwaysdata.net/connexion/change" method="post">
    <input class="box" placeholder="mot de passe" name="mdp" type="password"/><br>
    <input class="box" value='Valider' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="send" />
</form>

<?php
$function->end_page();
?>