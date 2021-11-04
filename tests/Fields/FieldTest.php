<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\Field;

class BaseField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'base_field');
    }
}


class FieldTest extends FieldsTestCase
{
    protected BaseField $baseField;

    public function test_field_name()
    {
        $this->assertEquals('baseField', $this->baseField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('base_field', $this->baseField->getType());
    }



    protected function setUp(): void
    {
        parent::setUp();

        $this->baseField = new BaseField('baseField');
    }
}
