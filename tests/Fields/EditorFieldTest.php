<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\EditorField;

class EditorFieldTest extends FieldsTestCase
{
    protected EditorField $editorField;

    public function test_field_name()
    {
        $this->assertEquals('editorField', $this->editorField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('editor', $this->editorField->getType());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->editorField = new EditorField('editorField');
    }
}
