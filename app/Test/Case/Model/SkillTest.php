<?php
App::uses('Skill', 'Model');

/**
 * Skill Test Case
 */
class SkillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.skill',
		'app.skill_category',
		'app.project',
		'app.user',
		'app.industry',
		'app.industries_project',
		'app.industries_user',
		'app.roll',
		'app.rolls_project',
		'app.rolls_user',
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
		$this->Skill = ClassRegistry::init('Skill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Skill);

		parent::tearDown();
	}

}
