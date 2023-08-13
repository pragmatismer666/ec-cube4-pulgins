<?php

namespace Plugin\PointsOnReferral\Tests\Form\Type\Admin;

use Eccube\Common\Constant;
use Eccube\Tests\Form\Type\AbstractTypeTestCase;
use Plugin\PointsOnReferral\Form\Type\Admin\ConfigType;

class ConfigTypeTest extends AbstractTypeTestCase {

    protected $form;

    public function setUp() {
        parent::setUp();
        $this->form = $this->formFactory->createBuilder(ConfigType::class, null, [
            'csrf_protection' => false
        ])->getForm();
    }

    public function tearDown() {
        parent::tearDown(); // TODO: Change the autogenerated stub
        $this->form = null;
    }

    public function testValidForm() {
        $this->form->submit(array(
            'referrer_rewards_enabled' => Constant::ENABLED,
            'referrer_rewards' => 2000,
            'referee_rewards_enabled' => Constant::DISABLED,
            'referee_rewards' => 500
        ));
        $this->assertTrue($this->form->isValid(), "should return true for valid form data");
    }

    public function testInvalidForm() {
        $this->form->submit(array(
            'referrer_rewards_enabled' => Constant::DISABLED,
            'referrer_rewards' => -1,
            'referee_rewards_enabled' => Constant::DISABLED,
            'referee_rewards' => 500
        ));
        $this->assertFalse($this->form->isValid(), "should return false for invalid form data");
    }

}
