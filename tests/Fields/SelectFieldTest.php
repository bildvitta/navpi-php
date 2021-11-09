<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\SelectField;

class SelectFieldTest extends FieldsTestCase
{
    protected SelectField $selectField;

    public function test_field_name()
    {
        $this->assertEquals("selectField", $this->selectField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals("select", $this->selectField->getType());
    }

    public function test_field_multiple()
    {
        $this->selectField->multiple();
        $this->assertEquals(true, $this->getProperty($this->selectField, 'multiple'));
    }

    public function test_field_options()
    {
        $array = [
            "banana" => "Banana"
        ];

        $this->selectField->options($array);

        $this->assertEquals([
            [
                "label" => "Banana",
                "value" => "banana"
            ]
        ], $this->selectField->toArray()["options"]);
    }

    public function test_field_options_parsed()
    {
        $array = [
            [
                "label" => "Banana",
                "value" => "banana"
            ]
        ];

        $this->selectField->options($array, true);

        $this->assertEquals($array, $this->selectField->toArray()["options"]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->selectField = new SelectField("selectField");
    }
}
