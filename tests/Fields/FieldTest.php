<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\Field;

class BaseField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'base_field');
    }
}


class FieldTest extends FieldsTestCase
{
    protected BaseField $baseField;

    public function test_field_name()
    {
        $this->assertEquals('baseField', $this->baseField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('base_field', $this->baseField->getType());
    }

    public function test_field_exceptActions()
    {
        $this->baseField->exceptActions(['create']);

        $this->assertFalse($this->baseField->hasAction('create'));
    }

    public function test_field_default()
    {
        $this->baseField->default(true);

        $this->assertEquals(true, $this->getProperty($this->baseField, 'default'));
    }

    public function test_field_label()
    {
        $this->baseField->label('Kamikaze');

        $this->assertEquals('Kamikaze', $this->getProperty($this->baseField, 'label'));
    }

    public function test_field_disabled()
    {
        $this->baseField->disabled();

        $this->assertEquals(true, $this->getProperty($this->baseField, 'disable'));
    }

    public function test_field_create()
    {
        $created = BaseField::create('joverson');

        $this->assertEquals('joverson', $this->getProperty($created, 'name'));
    }

    public function test_field_hint()
    {
        $this->baseField->hint('Kamikaze');

        $this->assertEquals('Kamikaze', $this->getProperty($this->baseField, 'hint'));
    }

    public function test_field_readOnly()
    {
        $this->baseField->readOnly(true);

        $this->assertEquals(true, $this->getProperty($this->baseField, 'read_only'));
    }

    public function test_field_required()
    {
        $this->baseField->required(true);

        $this->assertEquals(true, $this->getProperty($this->baseField, 'required'));
    }

    public function test_field_relationKey()
    {
        $this->baseField->relationKey();

        $this->assertEquals('id', $this->baseField->getRelationKey());
    }

    public function test_field_getMultipleRelationKey()
    {
        $this->assertEquals(null, $this->baseField->getMultipleRelationKey());
    }

    public function test_field_childrenResourceClass()
    {
        $this->assertEquals(null, $this->baseField->childrenResourceClass());
    }

    public function test_field_without_pivot()
    {
        $created = BaseField::create('joverson');

        $this->assertEquals(null, $created->getPivot());
    }

    public function test_field_with_pivot()
    {
        $this->baseField->pivot('quantity');

        $this->assertEquals('quantity', $this->baseField->getPivot());
    }

    public function test_field_with_default_enableActions()
    {
        $this->assertTrue($this->baseField->hasEnableAction("create"));
    }

    public function test_field_with_enableActions()
    {
        $this->baseField->enableActions(['create']);
        $this->assertTrue($this->baseField->hasEnableAction("create"));
    }

    public function test_field_without_enableActions()
    {
        $this->baseField->enableActions(['show']);
        $this->assertFalse($this->baseField->hasEnableAction("create"));
    }

    public function test_field_with_default_hasActions()
    {
        $created = BaseField::create('test_field_with_default_hasActions');
        $this->assertTrue($created->hasAction("create"));
    }

    public function test_field_without_default_enable_hasActions()
    {
        $created = BaseField::create('test_field_without_default_enable_hasActions');
        $created->enableActions(['create']);
        $this->assertTrue($created->hasAction("create"));
    }

    public function test_field_without_default_except_hasActions()
    {
        $created = BaseField::create('test_field_without_default_except_hasActions');
        $created->exceptActions(['update']);
        $this->assertTrue($created->hasAction("create"));
    }

    public function test_field_without_default_except_false_hasActions()
    {
        $created = BaseField::create('test_field_without_default_except_false_hasActions');
        $created->enableActions([]);
        $created->exceptActions(['update']);
        $this->assertFalse($created->hasAction("update"));
    }

    public function test_field_toArray()
    {
        $array = $this->baseField->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('name', $array);
        $this->assertArrayHasKey('type', $array);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->baseField = new BaseField('baseField');
    }
}
