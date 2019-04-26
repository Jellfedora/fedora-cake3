<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

class ViewCounter extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'count' => true,
        'name' => true,
    ];
}
