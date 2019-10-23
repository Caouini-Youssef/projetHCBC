<?php
    require '../discussion.php';
    require '../fonctions.php';
    start_page('nouvelle_discussion','../css/formulaire.css');
?>

<header class="boxMenu"  >
    <?php home(); ?>
    <p> <h1> NOUVELLE DISCUSSION </h1></p>
</header>

<form class="formulaire" action="new_discussion_processing.php" method="post">
    <input class="box" placeholder="Titre " name="title" type="text"/><br>
    <input class="box" placeholder="Nbre de messages max" name="messageMax" type="text"/><br>
    <input class="box" value='Créer' type="submit"/> </br>
    <input class="box" type="hidden" name="action" value="mailer" />
</form>

<?php
    end_page();
?>
