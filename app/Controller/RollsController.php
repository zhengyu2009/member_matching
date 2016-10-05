<?php
App::uses('AppController', 'Controller');
/**
 * Rolls Controller
 *
 * @property Roll $Roll
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RollsController extends AppController {

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
		$this->Roll->recursive = 0;
		$this->set('rolls', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Roll->exists($id)) {
			throw new NotFoundException(__('Invalid roll'));
		}
		$options = array('conditions' => array('Roll.' . $this->Roll->primaryKey => $id));
		$this->set('roll', $this->Roll->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Roll->create();
			if ($this->Roll->save($this->request->data)) {
				$this->Session->setFlash(__('The roll has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The roll could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$projects = $this->Roll->Project->find('list');
		$users = $this->Roll->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Roll->exists($id)) {
			throw new NotFoundException(__('Invalid roll'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Roll->save($this->request->data)) {
				$this->Session->setFlash(__('The roll has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The roll could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Roll.' . $this->Roll->primaryKey => $id));
			$this->request->data = $this->Roll->find('first', $options);
		}
		$projects = $this->Roll->Project->find('list');
		$users = $this->Roll->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Roll->id = $id;
		if (!$this->Roll->exists()) {
			throw new NotFoundException(__('Invalid roll'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Roll->delete()) {
			$this->Session->setFlash(__('The roll has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The roll could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
