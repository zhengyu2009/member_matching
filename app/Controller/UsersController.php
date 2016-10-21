<?php
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

    public $helpers = array(
        'Form', 'Html', 'Js'
    );

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow();
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash',
        'Auth' => array(
//                'loginRedirect' => array(
//                    'controller' => 'posts',
//                    'action' => 'index'
//                ),
//                'logoutRedirect' => array(
//                    'controller' => 'pages',
//                    'action' => 'display',
//                    'home'
//                ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
        );

/**
 * index method
 *
 * @return void
 */
	public function index() {
        session_start();

		$this->User->recursive = 1;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
        $industryLists = $this->User->Industry->find('list');
        $this->set(compact( 'industryLists'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add()
    {
        session_start();
//        $this->log($_SESSION);
         $_SESSION['is_new_user'] = true;
        if (($_SESSION['is_new_user'] == true)) {
            if ($this->request->is('post')) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            } else {
                $this->request->data('User.username', $_SESSION['fb_user_name'])
                ->data('User.email', $_SESSION['fb_user_email'])
                ->data('User.facebook', 'https://www.facebook.com/' . $_SESSION['fb_user_id'])
                ->data('User.fb_user_id', $_SESSION['fb_user_id']);
            }
            $areas = $this->User->Area->find('list');
            $industries = $this->User->Industry->find('list');
            $rolls = $this->User->Roll->find('list');
            $skills = $this->User->Skill->find('list');
            $this->set(compact('areas', 'industries', 'rolls', 'skills'));
        }  else {
            return $this->redirect(array('action' => 'index'));
        }

    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        session_start();
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
// 			$this->log($this->request->data);
		}
		$areas = $this->User->Area->find('list');
		$industries = $this->User->Industry->find('list');
		$rolls = $this->User->Roll->find('list');
		$skills = $this->User->Skill->find('list');
		$this->set(compact('areas', 'industries', 'rolls', 'skills'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function login() {
        if($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect(array('controller' => 'projects', 'action' => 'index'));
            } else {
                $this->Flash->error(__('Invalid username or password'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}//End

