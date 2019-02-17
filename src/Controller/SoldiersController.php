<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

class SoldiersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
    }
    public function index()
    {
        $soldiers = $this->Paginator->paginate($this->Soldiers->find());
        $this->set(compact('soldiers'));
    }
    public function view($slug)
    {
        $soldier = $this->Soldiers->findBySlug($slug)->firstOrFail();
        $this->set(compact('soldier'));
    }
    public function battle($slug)
    {
        // Ajout du joueur
        $soldierOne = $this->Soldiers->findBySlug('Jellfedora')->firstOrFail();
        $this->set(compact('soldierOne'));

        // Ajout de l'ennemi
        //$soldierTwo = $this->Soldiers->findBySlug('Sephiroth')->firstOrFail();
        //$soldierTwo = $this->Soldiers->findBySlug('Scorpion')->firstOrFail();

        // ajouter nom ennemi ex(http://localhost/Projets-web/fedora_cake3/soldiers/battle/Scorpion)
        $soldierTwo = $this->Soldiers->findBySlug($slug)->firstOrFail();
        $this->set(compact('soldierTwo'));




    }




}
