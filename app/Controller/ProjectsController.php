<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ProjectsController extends AppController {

    public $helpers = array(
        'Form', 'Html', 'Js'
    );

//    public $autoRender = false;
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
//		$this->Project->recursive = 0;
        $rolls = $this->Project->Roll->find('list');
        $skills = $this->Project->Skill->find('list');
        $industries = $this->Project->Industry->find('list');
        $projects = $this->Paginator->paginate();

		$this->set(compact('projects','industries', 'rolls', 'skills'));
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
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Project->User->find('list');
//		$industries = $this->Project->Industry->find('list');
		$industries = $this->Project->Industry->find('list');
//		$rollsUsers = $this->Project->RollsUser->find('list');
		$rolls = $this->Project->Roll->find('list');
		$skills = $this->Project->Skill->find('list');
        $areas = $this->Project->Area->find('list');
		$this->set(compact('users', 'industries', 'rolls', 'skills', 'areas'));
//        $this->set(compact('users', 'industries', 'industries', 'rollsUsers', 'rolls', 'skills'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$users = $this->Project->User->find('list');
//		$industries = $this->Project->Industry->find('list');
		$industries = $this->Project->Industry->find('list');
//		$rollsUsers = $this->Project->RollsUser->find('list');
		$rolls = $this->Project->Roll->find('list');
		$skills = $this->Project->Skill->find('list');
        $areas = $this->Project->Area->find('list');
		$this->set(compact('users', 'industries', 'rolls', 'skills', 'areas'));
        $this->set('projects', $this->request->data);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('The project has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The project could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
