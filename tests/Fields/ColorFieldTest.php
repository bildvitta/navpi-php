<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\ColorField;

class ColorFieldTest extends FieldsTestCase
{
    protected ColorField $colorField;

    public function test_field_name()
    {
        $this->assertEquals('colorField', $this->colorField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('color', $this->colorField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->colorField = new ColorField('colorField');
    }
}
