<?php

/**
 * Class Membre
 */
class Membre
{
    private $_id;
    private $_nom;
    private $_civilite;
    private $_mail;
    private $_mdp;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $methode = 'set'.ucfirst($key);

            if(method_exists($this, $methode))
                $this->$methode($value);
        }
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite): void
    {
        $this->_civilite = $civilite;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->_mail = $mail;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->_nom = $nom;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp): void
    {
        $this->_mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->_civilite;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->_mail;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->_mdp;
    }
}