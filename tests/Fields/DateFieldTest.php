<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\DateField;

class DateFieldTest extends FieldsTestCase
{
    protected DateField $dateField;

    public function test_field_name()
    {
        $this->assertEquals('dateField', $this->dateField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('date', $this->dateField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dateField = new DateField('dateField');
    }
}
