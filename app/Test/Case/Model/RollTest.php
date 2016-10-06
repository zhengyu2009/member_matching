<?php
App::uses('Roll', 'Model');

/**
 * Roll Test Case
 */
class RollTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.roll',
		'app.project',
		'app.user',
		'app.area',
		'app.industry',
		'app.industries_project',
		'app.industries_user',
		'app.rolls_user',
		'app.skill',
		'app.skill_category',
		'app.skills_project',
		'app.skills_user',
		'app.projects_rolls_user',
		'app.rolls_project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Roll = ClassRegistry::init('Roll');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Roll);

		parent::tearDown();
	}

}
