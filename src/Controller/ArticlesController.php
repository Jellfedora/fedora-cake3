<?php
// src/Controller/ArticlesController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
    }
    public function index()
    {
        // if ($user) {
        //     echo ('yo');
        //     die;
        // }
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }
    public function view($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }
    public function add()
    {
        $user_id = $this->request->getSession()->read('Auth.User.id');
        // Si l'utilisateur n'est pas l'admin
        if ($user_id != 2) {
            return $this->redirect(['controller'=> 'pages ']);
        } else {
            $article = $this->Articles->newEntity();
            if ($this->request->is('post')) {
                $article = $this->Articles->patchEntity($article, $this->request->getData());
            // Changé : On force le user_id à celui de la session
                $article->user_id = $this->Auth->user('id');
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Votre article a été sauvegardé.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Impossible d\'ajouter votre article.'));
            }

            // Récupère une liste des tags.
            $tags = $this->Articles->Tags->find('list');

            // Passe les tags au context de la view
            $this->set('tags', $tags);
            $this->set('article', $article);
        }
    }
    public function edit($slug)
    {
        $user_id = $this->request->getSession()->read('Auth.User.id');
        // Si l'utilisateur n'est pas l'admin
        if ($user_id != 2) {
            return $this->redirect(['controller'=> 'pages']);
        } else {
            $article = $this->Articles
                ->findBySlug($slug)
                ->contain('Tags') // Charge les tags associés
                ->firstOrFail();
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->getData(), [
                    // Ajouté : Empêche la modification du user_id.
                    'accessibleFields' => ['user_id' => false]
                ]);
                if ($this->Articles->save($article)) {
                    //echo($this->Articles->save($article));die;
                    $this->Flash->success(__('Votre article a été modifié.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Impossible de mettre à jour l\'article.'));
            }
            // Récupère une liste des tags.
            $tags = $this->Articles->Tags->find('list');

            // Passe les tags au context de la view
            $this->set('tags', $tags);

            $this->set('article', $article);
        }

    }
    public function delete($slug)
    {
        $user_id = $this->request->getSession()->read('Auth.User.id');
        // Si l'utilisateur n'est pas l'admin
        if ($user_id != 2) {
            return $this->redirect(['controller'=> 'pages ']);
        } else {
            $this->request->allowMethod(['post', 'delete']);
            $article = $this->Articles->findBySlug($slug)->firstOrFail();
            if ($this->Articles->delete($article)) {
                $this->Flash->success(__('L\'article {0} a été supprimé.', $article->title));
                return $this->redirect(['action' => 'index']);
            }
        }
    }
    public function tags(...$tags)
    {
    // La clé 'pass' est fournie par CakePHP et contient tous les
    // segments d'URL passés dans la requête
        $tags = $this->request->getParam('pass');
    // Utilisation de ArticlesTable pour trouver les articles taggés
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags
        ]);
    // Passage des variable dans le contexte de la view du template
        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
    // Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
    // authentifiés sur l'application
        if (in_array($action, ['add', 'edit', 'delete', 'tags'])) {
            return true;
        }
    // Toutes les autres actions nécessitent un slug
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
    // On vérifie que l'article appartient à l'utilisateur connecté
        $article = $this->Articles->findBySlug($slug)->first();
        return $article->user_id === $user['id'];
    }
}
