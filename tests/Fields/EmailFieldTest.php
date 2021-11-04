<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\EmailField;

class EmailFieldTest extends FieldsTestCase
{
    protected EmailField $emailField;

    public function test_field_name()
    {
        $this->assertEquals('emailField', $this->emailField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('email', $this->emailField->getType());
    }

    public function test_fields_prefix()
    {
        $prefix = "email";
        $this->emailField->prefix($prefix);

        $this->assertEquals($prefix, $this->getProperty($this->emailField, 'prefix'));
    }

    public function test_fields_suffix()
    {
        $suffix = "email";
        $this->emailField->suffix($suffix);

        $this->assertEquals($suffix, $this->getProperty($this->emailField, 'suffix'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->emailField = new EmailField('emailField');
    }
}
