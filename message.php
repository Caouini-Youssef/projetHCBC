<?php

class message
{
    private $contenuMessage;
    private $auteur;
    private $createur;
    private $dateAjout;

    public function __construct($contenuMessage, $auteur, $createur, $dateAjout)
    {
        $this->SetContenuMessage($contenuMessage);
        $this->SetAuteur($auteur);
        $this->Setcreateur($createur);
        $this->SetDateAjout($dateAjout);
    }

    public function setContenuMessage($contenuMessage)
    {
        $this->contenuMessage = $contenuMessage;
    }

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function setcreateur($createur)
    {
        $this->createur = $createur;
    }

    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    public function getContenuMessage()
    {
        return $this->contenuMessage;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getcreateur()
    {
        return $this->createur;
    }

    public function getDateAjout()
    {
        return $this->dateAjout;
    }


    public function showMessage()
    {
        echo $this->getContenuMessage();
        echo '<br />';
        echo $this->getAuteur();
        echo '<br />';
        echo $this->getcreateur();
        echo '<br />';
        echo $this->getDateAjout();
        echo '<br />';
    }
}
