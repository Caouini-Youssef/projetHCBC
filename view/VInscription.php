<?php
$function = new Vfunction ();
$function->start_page('Accueil', '../css/formulaire.css');
?>

    <header>
        <div class="boxFreeNote">
            <?php $function->home(); ?>
        </div>
        <div class="boxMenu">
            <h1> INSCRIPTION </h1>
        </div>
    </header>


<form class="formulaire" action="http://groupehcbc.alwaysdata.net/inscription/processing" method="post">
    <select class="box" name="civ">
        <option value=""> --Civilité-- </option>
        <option value="fem"> Femme </option>
        <option value="hom"> Homme </option>
        <option value="other">Autre </option>
    </select></br>
    <input class="box" placeholder="E-Mail" name="mail" type="text"/> </br>
    <input class="box" placeholder="Mot De Passe" name="mdp" type="password"/> </br>
    <input class="box" placeholder="Retapez votre MDP" name="mdp2" type="password"/> </br>
    <input class="box" placeholder="Nom" name="nom" type="text"/> </br>
    <input  class="button" value='Soumettre' type="submit"/> </br>
    <input  class="button" type="hidden" name="action" value="mailer" />
</form>

<?php
    $function->end_page();
?>