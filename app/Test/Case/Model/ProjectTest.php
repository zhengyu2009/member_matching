<?php
App::uses('Project', 'Model');

/**
 * Project Test Case
 */
class ProjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.project',
		'app.user',
		'app.industry',
		'app.industries_project',
		'app.industries_user',
		'app.roll',
		'app.rolls_project',
		'app.skill',
		'app.skills_project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Project = ClassRegistry::init('Project');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Project);

		parent::tearDown();
	}

}
