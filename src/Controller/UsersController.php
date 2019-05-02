<?php
namespace App\Controller;

use App\Controller\AppController;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user_id = $this->request->getSession()->read('Auth.User.id');
        // Si l'utilisateur n'est pas l'admin
        if ($user_id != 2) {
            return $this->redirect(['controller'=> 'pages ']);
        } else {
            $users = $this->paginate($this->Users);

            $this->set(compact('users'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // debug($user);die();
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Vous avez bien été inscrit'));
                // Connecte automatiquement
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl(array('controller'=>'Games', 'action' => 'play')));
             }
            }
            $this->Flash->error(__('Une erreur est arrivée'));
            return $this->redirect($this->Auth->redirectUrl(array('controller'=>'Users', 'action' => 'login')));
        }
        $this->Flash->error(__('Oups Une erreur est arrivée, veuillez réessayer plus tard.'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Vos données ont bien été modifiés'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Oups un probléme est arrivé'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'logout']);
    }

    public function login()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl(array('controller'=>'Pages', 'action'=> 'home')));
            }
            $this->Flash->error('Votre adresse mail ou votre mot de passe est incorrect.');
        }
        // Pour le formulaire d'ajout
        $this->set(compact('user'));
    }

    public function initialize()
    {
        parent::initialize();
        //commentez ci dessous pour ajouter user
         //$this->Auth->allow(['logout']);
    }

    public function logout()
    {
        $session = $this->getRequest()->getSession();//rappel de la session
        $session->destroy(); // Détruit la session
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
    }
}
