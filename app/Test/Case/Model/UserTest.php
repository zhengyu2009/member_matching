<?php
App::uses('User', 'Model');

/**
 * User Test Case
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.area',
		'app.project',
		'app.industry',
		'app.industries_project',
		'app.industries_user',
		'app.rolls_user',
		'app.projects_rolls_user',
		'app.roll',
		'app.rolls_project',
		'app.skill',
		'app.skill_category',
		'app.skills_project',
		'app.skills_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
