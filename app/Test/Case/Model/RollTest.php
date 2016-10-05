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
		'app.industry',
		'app.industries_project',
		'app.industries_user',
		'app.rolls_project',
		'app.skill',
		'app.skills_project',
		'app.rolls_user'
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
