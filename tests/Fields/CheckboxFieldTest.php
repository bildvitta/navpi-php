<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\CheckboxField;

class CheckboxFieldTest extends FieldsTestCase
{
    protected CheckboxField $checkboxField;

    public function test_field_name()
    {
        $this->assertEquals("checkboxField", $this->checkboxField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals("checkbox", $this->checkboxField->getType());
    }

    public function test_field_options()
    {
        $array = [
            "banana" => "Banana"
        ];

        $this->checkboxField->options($array);

        $this->assertEquals([
            [
                "label" => "Banana",
                "value" => "banana"
            ]
        ], $this->checkboxField->toArray()["options"]);
    }

    public function test_field_options_parsed()
    {
        $array = [
            [
                "label" => "Banana",
                "value" => "banana"
            ]
        ];

        $this->checkboxField->options($array, true);

        $this->assertEquals($array, $this->checkboxField->toArray()["options"]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->checkboxField = new CheckboxField("checkboxField");
    }
}
