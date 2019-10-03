<?php
    require 'fonctions.php';
    start_page('Accueil', 'css/index.css');
?>

    <header>
        <div class="boxFreeNote">
            <h1> FreeNote </h1>
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
        <section class="presentation">
            <p class="p1">
                Un réseau social d’un nouveau genre. L’objectif est très simple et pourtant les possibilités sont infinies ! Le jeu consiste à créer des fils de discussions à partir de message participatif écrit par les utilisateurs.
            </p>
            <p class="p2">
                Chaque joueur pourra ajouter un ou deux mots qui seront placés en fin de phrase.
                Les membres pourront par la suite voter pour leur chat préféré !
            </p>
        </section>

        <section class="corps">

            <form class="search">
                <input placeholder="Rechercher" type="search">
            </form>

            <select class="liste" size="3">
                <option>cerise</option>
                <option>orange</option>
                <option>pomme</option>
            </select>

        </section>

<?php
    end_page();
?>