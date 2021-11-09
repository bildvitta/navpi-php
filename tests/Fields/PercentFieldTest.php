<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\PercentField;

class PercentFieldTest extends FieldsTestCase
{
    protected PercentField $percentField;

    public function test_field_name()
    {
        $this->assertEquals('percentField', $this->percentField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('percent', $this->percentField->getType());
    }

    public function test_fields_places()
    {
        $places = 2;
        $this->percentField->places($places);

        $this->assertEquals($places, $this->getProperty($this->percentField, 'places'));
    }

    public function test_fields_min()
    {
        $min = 0;
        $this->percentField->min($min);

        $this->assertEquals($min, $this->getProperty($this->percentField, 'min'));
    }

    public function test_fields_max()
    {
        $max = 10000;
        $this->percentField->max($max);

        $this->assertEquals($max, $this->getProperty($this->percentField, 'max'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->percentField = new PercentField('percentField');
    }
}
