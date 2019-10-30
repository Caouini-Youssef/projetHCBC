<?php
class CAccueil
{
    private $_articleManager;
    private $_view;

    public function __construct($url)
    {
        if (isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->membres();
    }

    private function membres()
    {
        $this->_articleManager = new MembreManager;
        $articles = $this->_articleManager->getMembres();

        require_once('view/default.php');
    }
}