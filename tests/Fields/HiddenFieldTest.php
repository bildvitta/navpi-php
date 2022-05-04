<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\HiddenField;

class HiddenFieldTest extends FieldsTestCase
{
    protected HiddenField $hiddenField;

    public function test_field_name()
    {
        $this->assertEquals('hiddenField', $this->hiddenField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('hidden', $this->hiddenField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenField = new HiddenField('hiddenField');
    }
}
