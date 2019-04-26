<?php
// src/Controller/ArticlesController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class TeddyController extends AppController
{
    // public function initialize()
    // {
    //     parent::initialize();
    //     $this->loadComponent('Paginator');
    //     $this->loadComponent('Flash'); // Inclusion du FlashComponent
    // }
    public function index()
    {
        // Fait appel au model Soldiers
        $this->loadModel('Viewscounter');
        // Compteur de vues
        $viewscounter= $this->Viewscounter;
        $query = $viewscounter
        ->find()
        ->where(['name' => 'teddy']);

        foreach ($query as $counter) {
        $counter;
        }
        // var_dump($counter->count);die();
        $counter_view=$counter->count;

        
        $this->set(compact('counter_view'));
        
        // On ajoute +1 au nombre de vue
        $viewcounterTable = TableRegistry::get('Viewscounter');
        $count = $viewcounterTable->get(1); // Retourne le heros avec l'id 7 (TODO à rendre dynamique)

        $count->count = $count->count + 1;
        $viewcounterTable->save($count);

        // Fait appel au model Soldiers
        // $this->loadModel('Soldiers');

        // $soldiers= $this->Soldiers;
        // $query = $soldiers
        // ->find()
        // ->where(['slug' => 'Bomb']);

        // $hero = $this->Heroes->findByName($name)->firstOrFail();
        // $this->set(compact('hero'));
        // if ($user) {
        //     echo ('yo');
        //     die;
        // }
        // $articles = $this->Paginator->paginate($this->Articles->find());
        // $this->set(compact('articles'));
    }
    
    
}
