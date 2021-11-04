<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\FunctionField;

class FunctionFieldTest extends FieldsTestCase
{
    protected FunctionField $functionField;

    public function test_field_name()
    {
        $this->assertEquals('functionField', $this->functionField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('function', $this->functionField->getType());
    }

    public function test_field_setParameter()
    {
        $this->functionField->setParameter('arroz', "feijão");

        $this->assertEquals([
            'arroz' => 'feijão'
        ], $this->functionField->getFunctionParams());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->functionField = new FunctionField('functionField');
    }
}
