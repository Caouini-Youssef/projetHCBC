<?php
    $function = new Vfunction ();
    $function->start_page('Accueil', '../css/index.css');
?>

    <header>
        <div class="boxFreeNote">
            <?php $function->home() ?>
        </div>
        <div class="boxMenu">
            <nav>
                <ul>
                    <li>
                        <a class="boxci" href="http://groupehcbc.alwaysdata.net/connexion"> Connexion </a>
                    </li>
                    <li>
                        <a class="boxci" href="http://groupehcbc.alwaysdata.net/inscription"> Inscription </a>
                    </li>
                </ul>
            </nav>
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

    <section class="corps">
        <div class="boxRecherche">
            <div class="boxBarRecherche">
                <h4>Liste des conversations</h4>
                <input placeholder="Rechercher" type="search">
            </div>

            <div class="boxListeDiscussion">
                <label>
                    <select class="liste" size="3">
                        <?php #afficherListeDiscussions(); ?>
                    </select>
                </label>
            </div>
            <div class="boxListeMessage">
                <label>
                    <select class="liste" size="3">
                        <?php #afficherListeMessages(); ?>
                    </select>
                </label>
            </div>
        </div>
        <div class = "boxMessage">
            <p>Historique de discussion</p>
        </div>
    </section>;

<?php
    $function->end_page();
?>