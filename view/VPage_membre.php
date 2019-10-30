<?php
    $nom = $_SESSION['nom'];
    if ($nom == NULL) {
        echo('Vous n\'êtes pas connecté !' . PHP_EOL . 'Redirection...' . '<meta http-equiv="refresh" content="3;URL=connexion.php" />');
        die;
    }
    $function=new Vfunction();
    $chat = new CMessage();
    $function->start_page('Bienvenue !', '../css/index.css');
?>

<header>
    <div class="boxFreeNote">
        <?php $function->home() ?>
    </div>
    <div class="boxMenuDeroulant">
        <ul id="menu-accordeon">
            <li> <a href="new_discussion.php"> Nouvelle discussion </a> </li>
            <li><a href="#"><?php echo $nom ?></a>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="http://groupehcbc.alwaysdata.net/connexion/logout">Quitter</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>


<section id="conteneur_presentation">
    <div class="presentation">
        <h2>Un réseau social d’un nouveau genre</h2>
        <p>
            L’objectif est très simple et pourtant les possibilités sont infinies !
            Le jeu consiste à créer des fils de discussions à partir de message participatif écrit par les utilisateurs.
        </p>
        <p>
            Chaque joueur pourra ajouter un ou deux mots qui seront placés en fin de phrase.
            Les membres pourront par la suite voter pour leur chat préféré !
        </p>
    </div>
</section>

<section id="corps">

    <div class="boxBarRecherche">
        <h4>Liste des conversations</h4>
        <input placeholder="Rechercher" type="search">
    </div>
    <form action="http://groupehcbc.alwaysdata.net/discussion/new_chat" method="post">
        <input type="text" name="nom" placeholder="NOM"/> </br>
        <input type="number" name="msgmax" placeholder="MESSAGES MAX"/> </br>
        <input class="box" value='Créer' type="submit"/> </br>
        <input class="box" type="hidden" name="discu" value="mailer" />
    </form>
    <div class="allChat">
        <section class="ChatList">
            <?php $chat->showChat(); ?>
        </section>
        <section class="msgList">
            <?php $chat->showMessage(); ?>
            <form class="AddMsg" action="http://groupehcbc.alwaysdata.net/discussion/new_mgs" method="post">
                <textarea class="textarea" type="text" name="message" placeholder=" NOUVEAU MESSAGE "> </textarea><br />
                <input type="submit" class="box" value="Envoyer"/> </br>
            </form>
        </section>
    </div>
</section>

<?php
    $function->end_page();
?>