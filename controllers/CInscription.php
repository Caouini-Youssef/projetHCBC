<?php
class CInscription {

    public function __construct(){}

    // afficher formulaire
    public function connect () {
        include ('view/VInscription.php');
    }
}

$sign = new CInscription();
$sign->connect();