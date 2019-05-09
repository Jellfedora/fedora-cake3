<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\HeroesController;
use Cake\ORM\Query;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\ORM\TableRegistry;

class GamesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
        $this->loadComponent('RequestHandler');
    }
    public function play()
    {
        // Récupére le user id du joueur connecté
        $user_id = $this->Auth->user('id');

        // Fait appel au model Heroes
        $this->loadModel('Heroes');

        //Cherche si un héros a déjà été créé pour ce joueur
        $heroes = $this->Heroes;
        $query = $heroes
            ->find()
            ->where(['user_id' => $user_id]);

        foreach ($query as $hero) {
            $hero;
        }


        if (!empty($hero->user_id) && ($hero->user_id) === $user_id) {
            // Si le joueur a un perso
            // echo($heroes->name);die();
            $this->setAction('firstFight', $hero);
        } else {
            // Si le joueur n'a pas créé de perso il doit en créer un
            return $this->redirect(array('controller' => 'Heroes', 'action' => 'add'));
        }

        // On pousse les infos du héros dans un array
        $hero_info = [
            'id' => $hero->id,
            'name' => $hero->name,
            'level' => $hero->level,
            'hp' => $hero->hp,
            'attaque' => $hero->attaque,
            'potion' => $hero->potion
        ];


        // session en variable locale
        $session = $this->getRequest()->getSession(); //mise en place de la session
        $session->write('hero_info', $hero_info); //Write
        //debug($session->read('hero_info'));die();


    }

    // Charge les infos du joueur pour la vue
    public function heroInfo()
    {
        $session = $this->getRequest()->getSession(); //rappel de la session
        $hero_id = $session->read('hero_info.id');
        // Fait appel au model Heroes
        $this->loadModel('Heroes');

        $heroes = $this->Heroes;
        $query = $heroes
            ->find()
            ->where(['id' => $hero_id]);

        foreach ($query as $hero) {
            $hero;
        }
        //Envoi les infos du joueur en ajax
        $json = json_encode($hero);
        echo $json;
        exit;
    }

    public function firstFight()
    {
        // Fait appel au model Soldiers
        $this->loadModel('Soldiers');

        $soldiers = $this->Soldiers;
        $query = $soldiers
            ->find()
            ->where(['slug' => 'Queklain']);

        foreach ($query as $soldier) {
            $soldier;
        }
        // Ajout de l'ennemi sélectionné
        $this->set(compact('soldier'));
        ///debug($soldier);die();


    }

    public function victory()
    {
        // Ajax get fonctionnel!
        $message = 'Niveau 1 terminated!';
        $json = json_encode($message);
        echo $json;
        exit;
    }

    // Met à jour le niveau du joueur aprés une victoire
    public function updateHero()
    {
        //Session
        $session = $this->getRequest()->getSession(); //rappel de la session
        //debug($session->read('hero_info'));die();
        $hero_id = $session->read('hero_info.id');
        // Fait appel au model Heroes

        $heroesTable = TableRegistry::get('Heroes');
        $hero = $heroesTable->get($hero_id); // Retourne le heros avec l'id 7 (TODO à rendre dynamique)

        $hero->level = $hero->level + 1;
        $hero->attaque = $hero->attaque + 2;
        $hero->hp = $hero->hp + 20;
        $heroesTable->save($hero);

        $message = ('Vous avez atteint le level ' . $hero->level);
        $json = json_encode($message);
        echo $json;
        exit;
    }

    public function secondFight()
    {

        // Fait appel au model Soldiers
        $this->loadModel('Soldiers');

        $soldiers = $this->Soldiers;
        $query = $soldiers
            ->find()
            ->where(['slug' => 'Queklain2']);

        foreach ($query as $soldier) {
            $soldier;
        }
        // Ajout de l'ennemi sélectionné
        $this->set(compact('soldier'));
        ///debug($soldier);die();
    }

    public function thirdFight()
    {

        // Fait appel au model Soldiers
        $this->loadModel('Soldiers');

        $soldiers = $this->Soldiers;
        $query = $soldiers
            ->find()
            ->where(['slug' => 'Bomb']);

        foreach ($query as $soldier) {
            $soldier;
        }
        // Ajout de l'ennemi sélectionné
        $this->set(compact('soldier'));
        ///debug($soldier);die();
    }
}
