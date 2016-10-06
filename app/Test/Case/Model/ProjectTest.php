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
		'app.area',
		'app.industry',
		'app.industries_project',
		'app.industries_user',
		'app.roll',
		'app.rolls_project',
		'app.rolls_user',
		'app.skill',
		'app.skill_category',
		'app.skills_project',
		'app.skills_user',
		'app.projects_rolls_user'
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
