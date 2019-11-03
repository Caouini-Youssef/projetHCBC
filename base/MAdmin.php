<?php
    class MAdmin {

        public function showUser(){
            $bd = new MdbConnect();
            $dbLink = $bd->dbConnect();
            $query = $dbLink->query('SELECT * FROM user');
            return $query;
        }
    }