<?php
// class exemple pour la gestion des élément de la base de données. A renommer en un nom adéquat comme MembreManager.php etc..

/**
 * classe qui dérive de Model. Toutes les opération effectué sur la table ciblé passe par les méthode de cette classe
 */
class ArticleManager extends Model
{
    public function getMembres()
    {
        return $this->getAll('membre', 'Membre');
    }

    public function setMembres()
    {

    }
}