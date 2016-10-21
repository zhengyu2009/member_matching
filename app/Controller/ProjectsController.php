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
        session_start();
//		$this->Project->recursive = 1;
        if ($this->request->is('post')) {
        	$this->log($this->request);
            $areas = $this->request['data']['area'];
            $skills = $this->request['data']['Project']['Skill'];
            $industries = $this->request['data']['Project']['Industry'];

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
                'group' => array('Project.id'),
                'joins' => array(
                    array('table' => 'areas_projects',
                        'alias' => 'AreasProject',
                        'type' => 'inner',
                        'conditions' => array(
                            'Project.id = AreasProject.project_id',
                        )
                    ),
                    array(
                        'table' => 'areas',
                        'alias' => 'Area',
                        'type' => 'inner',
                        'conditions' => array(
                            'AreasProject.area_id = Area.id',
                        ),
                    ),
                     array('table' => 'skills_projects',
                         'alias' => 'SkillsProject',
                         'type' => 'inner',
                         'conditions' => array(
                             'Project.id = SkillsProject.project_id',
                         )
                     ),
                    array(
                        'table' => 'skills',
                        'alias' => 'Skill',
                        'type' => 'inner',
                        'conditions' => array(
                            'SkillsProject.skill_id = Skill.id',
                        ),
                    ),
//                    array('table' => 'industries_projects',
//                        'alias' => 'IndustriesProject',
//                        'type' => 'inner',
//                        'conditions' => array(
//                            'Project.id = IndustriesProject.project_id',
//                        )
//                    ),
//                    array(
//                        'table' => 'industries',
//                        'alias' => 'Industry',
//                        'type' => 'inner',
//                        'conditions' => array(
//                            'IndustriesProject.industry_id = Industry.id',
//                        ),
//                    )
                )
            );

            $projects = $this->Paginator->paginate('Project');

            $this->log($projects);
            $rolls = $this->Project->Roll->find('list');
            $skills = $this->Project->Skill->find('list');
            $industries = $this->Project->Industry->find('list');
            $this->set(compact('projects', 'industries', 'rolls', 'skills'));


        } else {
            $rolls = $this->Project->Roll->find('list');
            $skills = $this->Project->Skill->find('list');
            $industries = $this->Project->Industry->find('list');
            $projects = $this->Paginator->paginate();

            $this->set(compact('projects', 'industries', 'rolls', 'skills'));
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
        session_start();
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
        $users = $this->Project->User->find('list');
        $this->set(compact('users'));
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
		$industries = $this->Project->Industry->find('list');
		$rolls = $this->Project->Roll->find('list');
		$skills = $this->Project->Skill->find('list');
        $areas = $this->Project->Area->find('list');
		$this->set(compact('users', 'industries', 'rolls', 'skills', 'areas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
//        session_start();
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
//        $_SESSION['project_photo'] = $this->request->data['Project']['photo'];
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
