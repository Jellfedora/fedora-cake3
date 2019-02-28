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

}
