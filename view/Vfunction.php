<?php

    class Vfunction
    {

        public function __construct(){}

        /** Fonction qui s'occupe de créer une page html */
        function start_page($title, $css) {
            echo '<!DOCTYPE html><html lang="fr"><head><title>' . PHP_EOL . $title . '</title>  <link rel="stylesheet" href="' . PHP_EOL . $css . '" /> </head><body><link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">' . PHP_EOL;

        }

        /** fonction qui permet de clore une page html */
        function end_page()
        {
            echo '</body></html>';
        }

        /** affiche bouton home */
        function home()
        {
            echo '<a href="http://groupehcbc.alwaysdata.net/home"><img src="https://i.imgur.com/vAgpxHQ.png"/>  </a>';
        }
    }