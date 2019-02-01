<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; // Ajouter cette ligne
use Cake\ORM\Entity;

class User extends Entity
{

    // Tout le code de bake sera ici.

    // Ajoutez cette méthode
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
