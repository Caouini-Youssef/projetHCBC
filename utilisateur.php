
<?php


class utilisateur
{
    private $pseudo;
    private $derniereConnexion;
    private $listeAmis;
    private $listeDiscussion;

    public function __construct($pseudo, $derniereConnexion, $listeAmis, $listeDiscussion)
    {
        $this -> setPseudo($pseudo);
        $this -> setDerniereConnexion($derniereConnexion);
        $this -> setListeAmis($listeAmis);
        $this -> setListeDiscussion($listeDiscussion);
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setDerniereConnexion($derniereConnexion)
    {
        $this->derniereConnexion = $derniereConnexion;
    }

    public function setListeAmis($listeAmis)
    {
        $this->listeAmis = $listeAmis;
    }

    public function setListeDiscussion($listeDiscussion)
    {
        $this->listeDiscussion = $listeDiscussion;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getDerniereConnexion()
    {
        return $this->derniereConnexion;
    }

    public function getListeAmis()
    {
        return $this->listeAmis;
    }

    public function getListeDiscussion()
    {
        return $this->listeDiscussion;
    }

    public function modifierPseudo($newPseudo)
    {
        if ($newPseudo != null)
        {
            $this->setPseudo($newPseudo);
            echo 'pseudo correctement suprimé';
        }
        else{
            echo 'ce pseudo est impossible';
        }
    }

    public  function reponse()
    {
        //todo
    }

    public function demandeAmi($pseudoAmi)
    {
        if (reponse() == true)
        {
            $this->listeAmis += $pseudoAmi;
        }
        else
        {
            echo 'la demande a été refusé';
        }
    }
}

?>