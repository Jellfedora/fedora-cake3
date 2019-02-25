<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

class HeroesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
    }
    public function index()
    {
        $heroes = $this->Paginator->paginate($this->Heroes->find());
        $this->set(compact('heroes'));
    }
    public function view($name)
    {
        $hero = $this->Heroes->findByName($name)->firstOrFail();
        $this->set(compact('hero'));

    }
    public function add()
    {
        $hero = $this->Heroes->newEntity();
        if ($this->request->is('post')) {
            $hero = $this->Heroes->patchEntity($hero, $this->request->getData());
        // Changé : On force le user_id à celui de la session
            $hero->user_id = $this->Auth->user('id');
            if ($this->Heroes->save($hero)) {
                $this->Flash->success(__('Votre heros a été créé.'));
                return $this->redirect(['action' => 'view', $hero->name]);
            }
            $this->Flash->error(__('Impossible de créer votre héros.'));
        }


        $this->set('hero', $hero);
    }





}
