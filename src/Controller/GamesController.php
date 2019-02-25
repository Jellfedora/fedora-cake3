<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\HeroesController;
use Cake\ORM\Query;

class GamesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
    }
    public function play()
    {
        // Récupére le user id du joueur connecté
        $user_id = $this->Auth->user('id');

        // Fait appel au model Heroes
        $this->loadModel('Heroes');

        //Cherche si un héros a déjà été créé pour ce joueur
        $heroes= $this->Heroes;
        $query = $heroes
            ->find()
            ->where(['user_id' => $user_id]);

        foreach ($query as $hero) {
            $hero;
        }
        if (!empty ($hero->user_id) && ($hero->user_id)=== $user_id) {
            // Si le joueur a un perso
            // echo($heroes->name);die();
            $this->setAction('firstFight', $hero);
        } else {
            // Si le joueur n'a pas créé de perso il doit en créer un
            return $this->redirect(array('controller' => 'Heroes', 'action' => 'add'));
        }
    }

    public function firstFight($hero) {

        // Ajout du heros du joueur
        $this->set(compact('hero'));
        //debug($hero->name);die();

        // Fait appel au model Soldiers
        $this->loadModel('Soldiers');

        $soldiers= $this->Soldiers;
        $query = $soldiers
            ->find()
            ->where(['slug' => 'Sephiroth']);

        foreach ($query as $soldier) {
            $soldier;
        }
        // Ajout de l'ennemi sélectionné
        $this->set(compact('soldier'));
        ///debug($soldier);die();
    }






}
