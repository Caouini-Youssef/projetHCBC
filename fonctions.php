<?php

    //Fonction qui s'occupe de créer une page html
    function start_page($title, $css)
    {
        echo'<!DOCTYPE html><html lang="fr"><head><title>'.PHP_EOL.$title.'</title>  <link rel="stylesheet" href="'.PHP_EOL.$css.'" /> </head><body>'.PHP_EOL;
    }

    //fonction qui permet de clore un page html
    function end_page()
    {
        echo '</body></html>';
    }

   
?>