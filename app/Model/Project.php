<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property User $User
 * @property Industry $Industry
 * @property RollsUser $RollsUser
 * @property Roll $Roll
 * @property Skill $Skill
 */
class Project extends AppModel {

    public $actsAs = array(
        "Upload.Upload" => array(
            "photo" => array(
                "fields" => array(
                    "dir" => "photo_dir"
                ),
            ),
        ),
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
//		'description' => array(
//			'notBlank' => array(
//				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Industry' => array(
			'className' => 'Industry',
			'foreignKey' => 'industry_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
//		'Industry' => array(
//			'className' => 'Industry',
//			'joinTable' => 'industries_projects',
//			'foreignKey' => 'project_id',
//			'associationForeignKey' => 'industry_id',
//			'unique' => 'keepExisting',
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'finderQuery' => '',
//		),
//		'RollsUser' => array(
//			'className' => 'RollsUser',
//			'joinTable' => 'projects_rolls_users',
//			'foreignKey' => 'project_id',
//			'associationForeignKey' => 'rolls_user_id',
//			'unique' => 'keepExisting',
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'finderQuery' => '',
//		),
		'Roll' => array(
			'className' => 'Roll',
			'joinTable' => 'rolls_projects',
			'foreignKey' => 'project_id',
			'associationForeignKey' => 'roll_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Skill' => array(
			'className' => 'Skill',
			'joinTable' => 'skills_projects',
			'foreignKey' => 'project_id',
			'associationForeignKey' => 'skill_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
        'Area' => array(
			'className' => 'Area',
			'joinTable' => 'areas_projects',
			'foreignKey' => 'project_id',
			'associationForeignKey' => 'area_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	);

}
