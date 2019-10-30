<?php
class discussion
{
    private $titre;
    private $nbMessage;
    private $nbMessageMax;
    private $dateCreation;
    private $listeUtilisateurs;
    private $listeMessage;

    public function __construct($title, $nbMessageMax, $listeUtilisateurs)
    {
        $date = date('Y-m-d');
        $dbLink = $this->connectionBase();

        $this -> setTitre($title);
        $this -> setNbMessage(0);
        $this->setNbMessageMax($nbMessageMax);
        $this -> setDateCreation($date);
        $this -> setListeUtilisateurs($listeUtilisateurs);
        $this -> setListeMessage();


        $query = 'INSERT INTO discussion (date, nom, msgmax) VALUES 
            ("' . $date . '", \'' . $title . '\', \'' . $nbMessageMax .'\')';
        $this->nouvelleDiscussion($dbLink, $query);
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
     * @return mixed
     */public function getNbMessageMax()
{
    return $this->nbMessageMax;
}

    /**
     * @param mixed $nbMessageMax
     */public function setNbMessageMax($nbMessageMax): void
    {
        $this->nbMessageMax = $nbMessageMax;
    }



    public function connectionBase():void
    {
        $dbLink = dbConnect('mysql-groupehcbc.alwaysdata.net','191114','Zhamster13')
        if (!$dbLink)
        {
            die('Erreur lors de la connection à la base de donnée');
        }
          selectDb($dbLink, 'groupehcbc_projet');
        return $dbLink;
    }

    public function nouvelleDiscussion($dbLink, $query)
    {
        if (!($dbResult = mysqli_query($dbLink, $query)))
        {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
    /**
     * Méthode assurant l'actualisation des messages dans une discussion
     */
    public function actualiserMessage():void
    {
        $dbLink = $this->connectionBase();

        // Besoin de nouvelle relation dans la base de données : Discussion clé primaire son nom et ses membres avec des messages
        // relation message avec le message la date et l'auteur du message
        $query = $dbLink->query("SELECT message, date, heure FROM discussion WHERE id LIKE '$id'");
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

    public function showListeDiscussion()
    {

    }
}

?>

