<?php
    require 'fonctions.php';
    start_page('Inscription', 'CSS/formulaire.css');
?>

<header>
<p> <h1> INSCRIPTION </h1></p>
</header>


<form class="formulaire" action="data_processing.php" method="post">
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
    end_page();
?>