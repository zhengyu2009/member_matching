<?php
App::uses('AppController', 'Controller');
/**
 * Industries Controller
 *
 * @property Industry $Industry
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class IndustriesController extends AppController {

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
		$this->Industry->recursive = 0;
		$this->set('industries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Industry->exists($id)) {
			throw new NotFoundException(__('Invalid industry'));
		}
		$options = array('conditions' => array('Industry.' . $this->Industry->primaryKey => $id));
		$this->set('industry', $this->Industry->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Industry->create();
			if ($this->Industry->save($this->request->data)) {
				$this->Flash->success(__('The industry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The industry could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Industry->Project->find('list');
		$users = $this->Industry->User->find('list');
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
		if (!$this->Industry->exists($id)) {
			throw new NotFoundException(__('Invalid industry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Industry->save($this->request->data)) {
				$this->Flash->success(__('The industry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The industry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Industry.' . $this->Industry->primaryKey => $id));
			$this->request->data = $this->Industry->find('first', $options);
		}
		$projects = $this->Industry->Project->find('list');
		$users = $this->Industry->User->find('list');
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
		$this->Industry->id = $id;
		if (!$this->Industry->exists()) {
			throw new NotFoundException(__('Invalid industry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Industry->delete()) {
			$this->Flash->success(__('The industry has been deleted.'));
		} else {
			$this->Flash->error(__('The industry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
