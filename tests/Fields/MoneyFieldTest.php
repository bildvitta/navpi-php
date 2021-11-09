<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\MoneyField;

class MoneyFieldTest extends FieldsTestCase
{
    protected MoneyField $moneyField;

    public function test_field_name()
    {
        $this->assertEquals('moneyField', $this->moneyField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('money', $this->moneyField->getType());
    }

    public function test_fields_mask()
    {
        $mask = "###.##";
        $this->moneyField->mask($mask);

        $this->assertEquals($mask, $this->getProperty($this->moneyField, 'mask'));
    }

    public function test_fields_places()
    {
        $places = 2;
        $this->moneyField->places($places);

        $this->assertEquals($places, $this->getProperty($this->moneyField, 'places'));
    }

    public function test_fields_min()
    {
        $min = 0;
        $this->moneyField->min($min);

        $this->assertEquals($min, $this->getProperty($this->moneyField, 'min'));
    }

    public function test_fields_max()
    {
        $max = 10000;
        $this->moneyField->max($max);

        $this->assertEquals($max, $this->getProperty($this->moneyField, 'max'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->moneyField = new MoneyField('moneyField');
    }
}
