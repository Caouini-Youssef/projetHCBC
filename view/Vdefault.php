<?php
    $function = new Vfunction ();
    $function->start_page('Accueil', '../css/index.css');
    $show = new MMessage();
?>

    <header>
        <div class="boxFreeNote">
            <?php $function->home() ?>
        </div>
        <nav class="boxMenu">
            <ul>
                <li>
                    <a class="boxci" href="http://groupehcbc.alwaysdata.net/connexion"> Connexion </a>
                </li>
                <li>
                    <a class="boxci" href="http://groupehcbc.alwaysdata.net/inscription"> Inscription </a>
                </li>
            </ul>
        </nav>
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
        </div>
        <p> Les règles sont simples : </br> - Vous ne pouvez modifier un message qu'une fois ! </br>
            - Vous pouvez clore un message a tout moment. </br>
            - Les discussions ont un nombre de messages maximum.
        </p>
        <div class="allChat">
            <section class="ChatList">
                <?php $show->showDiscussions(); ?>
            </section>
        </div>
    </section>

<?php
    $function->end_page();
?>