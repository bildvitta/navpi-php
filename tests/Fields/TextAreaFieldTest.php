<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\TextAreaField;

class TextAreaFieldTest extends FieldsTestCase
{
    protected TextAreaField $textAreaField;

    public function test_field_name()
    {
        $this->assertEquals('textAreaField', $this->textAreaField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('textarea', $this->textAreaField->getType());
    }

    public function test_fields_maxLength()
    {
        $maxLength = 123456;
        $this->textAreaField->maxLength($maxLength);

        $this->assertEquals($maxLength, $this->getProperty($this->textAreaField, 'max_length'));
    }

    public function test_fields_minLength()
    {
        $minLength = 0;
        $this->textAreaField->minLength($minLength);

        $this->assertEquals($minLength, $this->getProperty($this->textAreaField, 'min_length'));
    }

    public function test_fields_prefix()
    {
        $prefix = '123456';
        $this->textAreaField->prefix($prefix);

        $this->assertEquals($prefix, $this->getProperty($this->textAreaField, 'prefix'));
    }

    public function test_fields_suffix()
    {
        $suffix = '123456';
        $this->textAreaField->suffix($suffix);

        $this->assertEquals($suffix, $this->getProperty($this->textAreaField, 'suffix'));
    }

    public function test_fields_mask()
    {
        $mask = "osdijfopasjfd234234980423-*";
        $this->textAreaField->mask($mask);

        $this->assertEquals($mask, $this->getProperty($this->textAreaField, 'mask'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->textAreaField = new TextAreaField('textAreaField');
    }
}
