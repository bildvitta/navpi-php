<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\PasswordField;

class PasswordFieldTest extends FieldsTestCase
{
    protected PasswordField $passwordField;

    public function test_field_name()
    {
        $this->assertEquals('passwordField', $this->passwordField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('password', $this->passwordField->getType());
    }

    public function test_fields_pattern()
    {
        $pattern = "pisdnfapsudf-qwe09r29012984=234";
        $this->passwordField->pattern($pattern);

        $this->assertEquals($pattern, $this->getProperty($this->passwordField, 'pattern'));
    }

    public function test_fields_hideStrengthChecker()
    {
        $hideStrengthChecker = true;
        $this->passwordField->hideStrengthChecker($hideStrengthChecker);

        $this->assertEquals($hideStrengthChecker, $this->getProperty($this->passwordField, 'hide_strength_checker'));
    }

    public function test_fields_hideStrengthChecker_false()
    {
        $hideStrengthChecker = false;
        $this->passwordField->hideStrengthChecker($hideStrengthChecker);

        $this->assertEquals($hideStrengthChecker, $this->getProperty($this->passwordField, 'hide_strength_checker'));
    }

    public function test_fields_useStrengthChecker()
    {
        $useStrengthChecker = true;
        $this->passwordField->useStrengthChecker($useStrengthChecker);

        $this->assertEquals($useStrengthChecker, $this->getProperty($this->passwordField, 'use_strength_checker'));
    }

    public function test_fields_useStrengthChecker_false()
    {
        $useStrengthChecker = false;
        $this->passwordField->useStrengthChecker($useStrengthChecker);

        $this->assertEquals($useStrengthChecker, $this->getProperty($this->passwordField, 'use_strength_checker'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->passwordField = new PasswordField('passwordField');
    }
}
