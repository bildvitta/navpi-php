<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\RadioField;

class RadioFieldTest extends FieldsTestCase
{
    protected RadioField $radioField;

    public function test_field_name()
    {
        $this->assertEquals("radioField", $this->radioField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals("radio", $this->radioField->getType());
    }

    public function test_field_options()
    {
        $array = [
            "banana" => "Banana"
        ];

        $this->radioField->options($array);

        $this->assertEquals([
            [
                "label" => "Banana",
                "value" => "banana"
            ]
        ], $this->radioField->toArray()["options"]);
    }

    public function test_field_options_parsed()
    {
        $array = [
            [
                "label" => "Banana",
                "value" => "banana"
            ]
        ];

        $this->radioField->options($array, true);

        $this->assertEquals($array, $this->radioField->toArray()["options"]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->radioField = new RadioField("radioField");
    }
}
