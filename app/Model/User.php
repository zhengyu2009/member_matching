<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Area $Area
 * @property Project $Project
 * @property Industry $Industry
 * @property Roll $Roll
 * @property Skill $Skill
 */
class User extends AppModel {

    public $actsAs = array(
        "Upload.Upload" => array(
            "photo" => array(
                "fields" => array(
                    "dir" => "photo_dir"
                ),
                // 'deleteOnUpdate' => true,
            ),
        ),
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'ProjectsRollsUser' => array(
            'className' => 'ProjectsRollsUser',
            'foreignKey' => 'user_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Industry' => array(
			'className' => 'Industry',
			'joinTable' => 'industries_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'industry_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Roll' => array(
			'className' => 'Roll',
			'joinTable' => 'rolls_users',
			'foreignKey' => 'user_id',
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
			'joinTable' => 'skills_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'skill_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
