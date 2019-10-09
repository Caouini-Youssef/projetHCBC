<?php
    session_start();
    $nom = $_SESSION['nom'];
    $mdp = $_SESSION['mdp'];
    require 'fonctions.php';
    start_page('Bienvenue !', 'css/index.css');
?>

<header>
    <div class="boxFreeNote">
        <?php home() ?>
    </div>
    <div class="boxMenu">
        <ul id="menu-accordeon">
            <li><a href="#"><?php echo $nom ?></a>
                <ul>
                    <li><a href="#">lien sous menu 1</a></li>
                    <li><a href="#">lien sous menu 1</a></li>
                    <li><a href="#">lien sous menu 1</a></li>
                    <li><a href="#">lien sous menu 1</a></li>
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
    <div class="presentation">

        <form class="search">
            <input placeholder="Rechercher" type="search">
        </form>

        <label>
            <select class="liste" size="3">
                <option>cerise</option>
                <option>orange</option>
                <option>pomme</option>
            </select>
        </label>
    </div>
</section>

<?php
end_page();
?>


