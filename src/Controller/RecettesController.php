<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

class RecettesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
    }
    public function index()
    {
        $recettes = $this->Paginator->paginate($this->Recettes->find());
        $this->set(compact('recettes'));
    }
    public function view($slug)
    {
        $recette = $this->Recettes->findBySlug($slug)->firstOrFail();
        $this->set(compact('recette'));
    }
    public function add()
    {
        $recette = $this->Recettes->newEntity();
        if ($this->request->is('post')) {
            $recette = $this->Recettes->patchEntity($recette, $this->request->getData());
        // Changé : On force le user_id à celui de la session
            $recette->user_id = $this->Auth->user('id');
            if ($this->Recettes->save($recette)) {
                $this->Flash->success(__('Votre recette a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre recette.'));
        }


        $this->set('recette', $recette);
    }
    public function edit($slug)
    {
        $recette = $this->Recettes
            ->findBySlug($slug)
            //->contain('Tags') // Charge les tags associés
            ->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Recettes->patchEntity($recette, $this->request->getData(), [
            // Ajouté : Empêche la modification du user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Recettes->save($recette)) {
                //echo($this->Recettes->save($article));die;
                $this->Flash->success(__('Votre recette a été modifié.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour l\'article.'));
        }


        $this->set('recette', $recette);
    }

}
