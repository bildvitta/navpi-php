<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\NestedField;
use stdClass;

class NestedFieldTest extends FieldsTestCase
{
    protected NestedField $nestedField;

    public function test_field_name()
    {
        $this->assertEquals('nestedField', $this->nestedField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('nested', $this->nestedField->getType());
    }

    public function test_field_children()
    {
        $stdClass = new stdClass();
        $this->nestedField->children($stdClass);

        $this->assertEquals($stdClass, $this->nestedField->childrenResourceClass());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->nestedField = new NestedField('nestedField');
    }
}
