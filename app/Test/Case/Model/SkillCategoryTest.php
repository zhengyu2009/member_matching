<?php
App::uses('SkillCategory', 'Model');

/**
 * SkillCategory Test Case
 */
class SkillCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.skill_category',
		'app.skill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SkillCategory = ClassRegistry::init('SkillCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SkillCategory);

		parent::tearDown();
	}

}
