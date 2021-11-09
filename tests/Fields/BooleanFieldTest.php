<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\BooleanField;

class BooleanFieldTest extends FieldsTestCase
{
    protected BooleanField $booleanField;

    public function test_field_name()
    {
        $this->assertEquals('booleanField', $this->booleanField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('boolean', $this->booleanField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->booleanField = new BooleanField('booleanField');
    }
}
