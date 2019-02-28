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
        $user_id = $this->request->getSession()->read('Auth.User.id');
        // Si l'utilisateur n'est pas l'admin
        if ($user_id != 2) {
            return $this->redirect(['controller'=> 'pages ']);
        } else {
            $soldiers = $this->Paginator->paginate($this->Soldiers->find());
            $this->set(compact('soldiers'));
        }
    }
    public function view($slug)
    {
        $user_id = $this->request->getSession()->read('Auth.User.id');
        // Si l'utilisateur n'est pas l'admin
        if ($user_id != 2) {
            return $this->redirect(['controller'=> 'pages ']);
        } else {
            $soldier = $this->Soldiers->findBySlug($slug)->firstOrFail();
            $this->set(compact('soldier'));
        }
    }

}
