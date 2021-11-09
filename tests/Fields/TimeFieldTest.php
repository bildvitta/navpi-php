<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\TimeField;

class TimeFieldTest extends FieldsTestCase
{
    protected TimeField $timeField;

    public function test_field_name()
    {
        $this->assertEquals('timeField', $this->timeField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('time', $this->timeField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->timeField = new TimeField('timeField');
    }
}
