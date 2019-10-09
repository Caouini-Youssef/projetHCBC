<?php

class discussion
{
    private $titre;
    private $nbMessage;
    private $dateCreation;
    private $listeUtilisateurs;

    public function __construct($titre, $nbMessage, $dateCreation, $listeUtilisateurs)
    {
        $this -> SetTitre($titre);
        $this -> SetNbMessage($nbMessage);
        $this -> SetDateCreation($dateCreation);
        $this -> setListeUtilisateurs($listeUtilisateurs);
    }

    public function __destruct()
    {
        echo 'La discussion a été correctement supprimée';
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setNbMessage($nbMessage)
    {
        $this->nbMessage = $nbMessage;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function setListeUtilisateurs($listeUtilisateurs)
    {
        $this->listeUtilisateurs = $listeUtilisateurs;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getNbMessage()
    {
        return $this->nbMessage;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function getListeUtilisateurs()
    {
        return $this->listeUtilisateurs;
    }

    public function showDiscussion()
    {
        echo $this->getTitre();
        echo '<br />';
        echo $this->getNbMessage();
        echo '<br />';
        echo $this->getDateCreation();
        echo '<br />';
        echo $this->getListeUtilisateurs();
        echo '<br />';
    }
}
