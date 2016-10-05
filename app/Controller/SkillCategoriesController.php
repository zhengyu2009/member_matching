<?php
App::uses('AppController', 'Controller');
/**
 * SkillCategories Controller
 *
 * @property SkillCategory $SkillCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SkillCategoriesController extends AppController {

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
		$this->SkillCategory->recursive = 0;
		$this->set('skillCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SkillCategory->exists($id)) {
			throw new NotFoundException(__('Invalid skill category'));
		}
		$options = array('conditions' => array('SkillCategory.' . $this->SkillCategory->primaryKey => $id));
		$this->set('skillCategory', $this->SkillCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SkillCategory->create();
			if ($this->SkillCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The skill category has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill category could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
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
		if (!$this->SkillCategory->exists($id)) {
			throw new NotFoundException(__('Invalid skill category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SkillCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The skill category has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill category could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('SkillCategory.' . $this->SkillCategory->primaryKey => $id));
			$this->request->data = $this->SkillCategory->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SkillCategory->id = $id;
		if (!$this->SkillCategory->exists()) {
			throw new NotFoundException(__('Invalid skill category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SkillCategory->delete()) {
			$this->Session->setFlash(__('The skill category has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The skill category could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
