<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\DateTimeField;

class DateTimeFieldTest extends FieldsTestCase
{
    protected DateTimeField $dateTimeField;

    public function test_field_name()
    {
        $this->assertEquals('dateTimeField', $this->dateTimeField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('datetime', $this->dateTimeField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dateTimeField = new DateTimeField('dateTimeField');
    }
}
