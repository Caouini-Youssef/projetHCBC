<?php

/**fonction reliant les inscription à la BD */
function database($date, $title, $msgMax)
{
    $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net','191114','Zhamster13');

    selectDb($dbLink, 'groupehcbc_projet');


    $query = 'INSERT INTO discussion (date, nom, msgmax) VALUES 
        ("' . $date . '", \'' . $title . '\', \'' . $msgMax .'\')';

    if (!($dbResult = mysqli_query($dbLink, $query))) {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
}

