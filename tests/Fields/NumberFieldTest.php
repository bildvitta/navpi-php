<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\NumberField;

class NumberFieldTest extends FieldsTestCase
{
    protected NumberField $numberField;

    public function test_field_name()
    {
        $this->assertEquals('numberField', $this->numberField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('number', $this->numberField->getType());
    }

    public function test_fields_places()
    {
        $places = 2;
        $this->numberField->places($places);

        $this->assertEquals($places, $this->getProperty($this->numberField, 'places'));
    }

    public function test_fields_min()
    {
        $min = 0;
        $this->numberField->min($min);

        $this->assertEquals($min, $this->getProperty($this->numberField, 'min'));
    }

    public function test_fields_max()
    {
        $max = 10000;
        $this->numberField->max($max);

        $this->assertEquals($max, $this->getProperty($this->numberField, 'max'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->numberField = new NumberField('numberField');
    }
}
