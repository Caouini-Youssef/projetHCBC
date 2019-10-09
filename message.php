<?php

class message
{
    private $contenuMessage;
    private $auteur;
    private $nbLike;
    private $dateAjout;
    private $statut;

    public function  __construct($contenuMessage, $auteur, $nbLike, $dateAjout, $statut)
    {
        $this -> SetContenuMessage($contenuMessage);
        $this -> SetAuteur($auteur);
        $this -> SetNbLike($nbLike);
        $this -> SetDateAjout($dateAjout);
        $this -> SetStatut($statut);
    }

    public function setContenuMessage($contenuMessage)
    {
        $this->contenuMessage = $contenuMessage;
    }

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function setNbLike($nbLike)
    {
        $this->nbLike = $nbLike;
    }

    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getContenuMessage()
    {
        return $this->contenuMessage;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getNbLike()
    {
        return $this->nbLike;
    }

    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function showMessage()
    {
        echo $this->getContenuMessage();
        echo '<br />';
        echo $this->getAuteur();
        echo '<br />';
        echo $this->getNbLike();
        echo '<br />';
        echo $this->getDateAjout();
        echo '<br />';
        echo $this->getStatut();
        echo '<br />';
    }

    public function modifierMessage($nouveauContenu)
    {
        $this->contenuMessage = $nouveauContenu;
        $this->setStatut("modifié");
    }

    public function supprimerMessage()
    {
        $this->contenuMessage = null;
        $this->setStatut('supprimé');
    }
}

?>