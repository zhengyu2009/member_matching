<?php
App::uses('AppModel', 'Model');
/**
 * SkillCategory Model
 *
 * @property Skill $Skill
 */
class SkillCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'skill_category_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'skill_category_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Skill' => array(
			'className' => 'Skill',
			'foreignKey' => 'skill_category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
