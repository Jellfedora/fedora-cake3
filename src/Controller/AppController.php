<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

use Cake\Core\Configure;
use Cake\Cache\CacheEngine;

//Affiche le debugkit
//Configure::write('DebugKit.forceEnable', false);

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {

        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false
        ]);
        $this->loadComponent('Auth', [
        // La ligne suivante a été ajoutée
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // 'addAction' => [
            //     'controller' => 'Users',
            //     'action' => 'add'
            // ],
         // Si pas autorisé, on renvoit sur la page précédente
            'unauthorizedRedirect' => $this->referer()
        ]);

            // Permet à l'action "display" de notre PagesController de continuer
            // à fonctionner. Autorise également les actions "read-only".
            $connected = $this->request->getSession()->read('Auth.User.email');

            // if (!$connected) {
                $this->Auth->allow(['display', 'view', 'index','add']);
            // }
    }

    public function isAuthorized($user)
    {
    // Par défaut, on refuse l'accès.
        return true;
    }
}
