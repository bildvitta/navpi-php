<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\DecimalField;

class DecimalFieldTest extends FieldsTestCase
{
    protected DecimalField $decimalField;

    public function test_field_name()
    {
        $this->assertEquals('decimalField', $this->decimalField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('decimal', $this->decimalField->getType());
    }

    public function test_field_mask()
    {
        $mask = '####.##';
        $this->decimalField->mask($mask);

        $this->assertEquals($mask, $this->getProperty($this->decimalField, 'mask'));
    }

    public function test_fields_places()
    {
        $places = 2;
        $this->decimalField->places($places);

        $this->assertEquals($places, $this->getProperty($this->decimalField, 'places'));
    }

    public function test_fields_min()
    {
        $min = 0;
        $this->decimalField->min($min);

        $this->assertEquals($min, $this->getProperty($this->decimalField, 'min'));
    }

    public function test_fields_max()
    {
        $max = 10;
        $this->decimalField->max($max);

        $this->assertEquals($max, $this->getProperty($this->decimalField, 'max'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->decimalField = new DecimalField('decimalField');
    }
}
