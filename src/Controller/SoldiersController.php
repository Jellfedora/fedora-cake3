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
    public function battle()
    {

        $soldierOne = $this->Soldiers->findBySlug('Jellfedora')->firstOrFail();
        $soldierTwo = $this->Soldiers->findBySlug('Sephiroth')->firstOrFail();


        $soldierOneHp = $soldierOne->hp;
        $soldierOneAttaque = $soldierOne->attaque;

        $soldierTwoHp = $soldierTwo->hp;
        $soldierTwoAttaque = $soldierTwo->attaque;


        $this->set(compact('soldierOne'));
        $this->set(compact('soldierTwo'));


    }




}
