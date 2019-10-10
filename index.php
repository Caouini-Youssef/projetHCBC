<?php
    require 'fonctions.php';
    start_page('Accueil', 'css/index.css');
?>

    <header>
        <div class="boxFreeNote">
           <?php home() ?>
        </div>
        <div class="boxMenu">
            <nav>
                <ul>

                    <li>
                        <a class="boxci" href="connexion.php"> Connexion </a>
                    </li>
                    <li>
                        <a class="boxci" href="inscription.php"> Inscription </a>
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

    <section id="corps">
        <div class="boxRecherche">
            <div class="boxBarRecherche">
                <h4>Liste des conversations</h4>
                <input placeholder="Rechercher" type="search">
            </div>
            <div class="boxListeDiscussion">
                    <label>
                        <select class="liste" size="3">
                        <?php afficherListeDiscussions(); ?>
                </select>
                <?php afficherDiscussion() ?>
            </label>
            </div>
        </div>
        <div class = "boxMessage">
            <p>Historique de discussion</p>
        </div>
    </section>

<?php
    end_page();
?>