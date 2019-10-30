<?php

    class MdbConnect
    {
        /** Connexion à la BD */
        public function dbConnect()
        {
            $dblink = new PDO("mysql:host=mysql-groupehcbc.alwaysdata.net;dbname=groupehcbc_projet", "191114", "Zhamster13");
            return $dblink;
        }
    }