<?php
class discussion
{
    private $titre;
    private $nbMessage;
    private $dateCreation;
    private $listeUtilisateurs;
    private $listeMessage;

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

    /**
     * @return mixed
     */
    public function getListeMessage()
    {
        return $this->listeMessage;
    }

    /**
     * @param mixed $listeMessage
     */
    public function setListeMessage($listeMessage): void
    {
        $this->listeMessage = $listeMessage;
    }

    /**
     * Méthode assurant l'actualisation des messages dans une discussion
     */
    public function actualiserMessage():void
    {
        $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net','191114','Zhamster13');

        selectDb($dbLink, 'groupehcbc_projet');

        // Besoin de nouvelle relation dans la base de données : Discussion clé primaire son nom et ses membres avec des messages
        // relation message avec le message la date et l'auteur du message
        $query = $dbLink->query("SELECT message, date, heure FROM user WHERE mail LIKE '$mail'");
        if($query == FALSE) {
            die ('Erreur SQL');
        }
        $posts = $query->fetch_all(PDO::FETCH_ASSOC);

        $mailBD = $posts[0][0];
        $mdpBD = $posts [0][1];
        $nom = $posts [0][2];
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

?>

