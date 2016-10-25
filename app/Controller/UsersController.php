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
        session_start();
        parent::beforeFilter();

        $this->Auth->allow('index', 'view', 'add');
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
                'logoutRedirect' => array(
                    'controller' => 'tops',
                    'action' => 'index'
                ),
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
//        session_start();

	//	$this->User->recursive = 1;
        if ($this->request->is('post')) {
            $this->log($this->request);
            $areas = $this->request['data']['area'];
            $skills = $this->request['data']['User']['Skill'];
            $industries = $this->request['data']['User']['Industry'];

            $opt_area = array('OR' => array('Area.id' => $areas));
            $opt_skill = array('OR' => array('Skill.id' => $skills));
            $opt_industry = array('OR' => array('Industry.id' => $industries));

            $opt = array($opt_area, $opt_skill, $opt_industry);
//            $opt = array(
//                array('OR' => array('Area.id' => $areas)),
//                array('OR' => array('Skill.id' => $skills)),
//                array('OR' => array('Industry.id' => $industries))
//            );

            $this->Paginator->settings = array(
                'conditions' => $opt,
                'recursive' => 1,
                'group' => array('User.id'),
                'joins' => array(
/*                    array('table' => 'areas_users',
                        'alias' => 'AreasUser',
                        'type' => 'inner',
                        'conditions' => array(
                            'User.id = AreasUser.user_id',
                        )
                    ),*/
//                    array(
//                        'table' => 'areas',
//                        'alias' => 'Area',
//                        'type' => 'inner',
//                        'conditions' => array(
//                            'AreasUser.area_id = Area.id',
//                        ),
//                    ),
                    array('table' => 'skills_users',
                        'alias' => 'SkillsUser',
                        'type' => 'inner',
                        'conditions' => array(
                            'User.id = SkillsUser.user_id',
                        )
                    ),
                    array(
                        'table' => 'skills',
                        'alias' => 'Skill',
                        'type' => 'inner',
                        'conditions' => array(
                            'SkillsUser.skill_id = Skill.id',
                        ),
                    ),
                    array('table' => 'industries_users',
                        'alias' => 'IndustriesUser',
                        'type' => 'inner',
                        'conditions' => array(
                            'User.id = IndustriesUser.user_id',
                        )
                    ),
                    array(
                        'table' => 'industries',
                        'alias' => 'Industry',
                        'type' => 'inner',
                        'conditions' => array(
                            'IndustriesUser.industry_id = Industry.id',
                        ),
                    )
                )
            );

            $users = $this->Paginator->paginate('User');

            $this->log($users);
            $rolls = $this->User->Roll->find('list');
            $skills = $this->User->Skill->find('list');
            $industries = $this->User->Industry->find('list');
            $this->set(compact('users', 'industries', 'rolls', 'skills'));


        } else {
            $rolls = $this->User->Roll->find('list');
            $skills = $this->User->Skill->find('list');
            $industries = $this->User->Industry->find('list');
            $users = $this->Paginator->paginate();

            $this->set(compact('users', 'industries', 'rolls', 'skills'));
        }
//        $options = array('conditions' => array('Project.' . $this->Project->primaryKey => 5));
//        $this->set('projects', $this->Project->find('all',$options));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
//	    if (session_status() == PHP_SESSION_NONE) {
//            session_start();
//        }
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
//        session_start();
//        $this->log($_SESSION);
         $_SESSION['is_new_fb_user'] = true;
        if (isset($_SESSION['is_new_fb_user']) && ($_SESSION['is_new_fb_user'] == true)) {
            if ($this->request->is('post')) { //POSTされたら保存
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            } else {
                if (isset($_SESSION['fb_user_id'])) {
                    $this->request->data('User.username', $_SESSION['fb_user_name'])
                        ->data('User.email', $_SESSION['fb_user_email'])
                        ->data('User.facebook', 'https://www.facebook.com/' . $_SESSION['fb_user_id'])
                        ->data('User.fb_user_id', $_SESSION['fb_user_id']);
                }
            }
            $areas = $this->User->Area->find('list');
            $industries = $this->User->Industry->find('list');
            $rolls = $this->User->Roll->find('list');
            $skills = $this->User->Skill->find('list');
            $this->set(compact('areas', 'industries', 'rolls', 'skills'));
        }  else {
            return $this->redirect(array('action' => 'index'));
        }
<<<<<<< HEAD
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

=======
        //save profile image in proper folder
//        if(isset($_POST['imagebase64'])){
//            $data = $_POST['imagebase64'];
//
//            list($type, $data) = explode(';', $data);
//            list(, $data) = explode(',', $data);
//            $data = base64_decode($data);
//
//            file_put_contents('image64.png', $data);
//        }
    }
>>>>>>> 896b529ea5a750486f4a36c5771dddaed627dc2d


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
//        session_start();
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
			$users = $this->request->data = $this->User->find('first', $options);
// 			$this->log($this->request->data);
		}
		$areas = $this->User->Area->find('list');
		$industries = $this->User->Industry->find('list');
		$rolls = $this->User->Roll->find('list');
		$skills = $this->User->Skill->find('list');
		$this->set(compact('users', 'areas', 'industries', 'rolls', 'skills'));
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
//        if (session_status() == PHP_SESSION_NONE) {
//            session_start();
//        }
        if(!defined('FACEBOOK_SDK_V4_SRC_DIR')){
            define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../Vendor/facebook/src/Facebook');
        }
        require_once __DIR__ . '/../Vendor/facebook/src/Facebook/autoload.php';

        $fb = new Facebook\Facebook([
            'app_id' => '1681825805467397',
            'app_secret' => '72640533266ffc04d8e3ca2708a13c5d',
            'default_graph_version' => 'v2.8',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl('https://mecci2-zhengyuc9.c9users.io/FbAuth/fbCallback', $permissions);
        $this->set(compact('loginUrl'));

        if($this->request->is('post')) {//cakephp Auth login
            if ($this->Auth->login()) {
                $this->log($this->Auth->user('id'));
                $_SESSION['login_user_id'] = $this->Auth->user('id');
                $this->redirect(array('controller' => 'projects', 'action' => 'index'));
            } else {
                $this->Flash->error(__('Invalid username or password'));
            }
        }

    }

    public function logout() {
        $_SESSION = array();
        session_destroy();
        $this->redirect($this->Auth->logout());
    }
    //Saving photo action by Croppie
    public function test2() {
        if(isset($_POST['imagebase64'])){
            $data = $_POST['imagebase64'];

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            file_put_contents('image64.png', $data);
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}//End

