<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\TextField;

class TextFieldTest extends FieldsTestCase
{
    protected TextField $textField;

    public function test_field_name()
    {
        $this->assertEquals('textField', $this->textField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('text', $this->textField->getType());
    }

    public function test_fields_maxLength()
    {
        $maxLength = 123456;
        $this->textField->maxLength($maxLength);

        $this->assertEquals($maxLength, $this->getProperty($this->textField, 'max_length'));
    }

    public function test_fields_minLength()
    {
        $minLength = 0;
        $this->textField->minLength($minLength);

        $this->assertEquals($minLength, $this->getProperty($this->textField, 'min_length'));
    }

    public function test_fields_prefix()
    {
        $prefix = '123456';
        $this->textField->prefix($prefix);

        $this->assertEquals($prefix, $this->getProperty($this->textField, 'prefix'));
    }

    public function test_fields_suffix()
    {
        $suffix = '123456';
        $this->textField->suffix($suffix);

        $this->assertEquals($suffix, $this->getProperty($this->textField, 'suffix'));
    }

    public function test_fields_mask()
    {
        $mask = "osdijfopasjfd234234980423-*";
        $this->textField->mask($mask);

        $this->assertEquals($mask, $this->getProperty($this->textField, 'mask'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->textField = new TextField('textField');
    }
}
