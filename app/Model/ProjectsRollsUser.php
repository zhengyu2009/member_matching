<?php
App::uses('AppModel', 'Model');
/**
 * ProjectsRollsUser Model
 *
 * @property Project $Project
 * @property Roll $Roll
 * @property User $User
 */
class ProjectsRollsUser extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Roll' => array(
			'className' => 'Roll',
			'foreignKey' => 'roll_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
