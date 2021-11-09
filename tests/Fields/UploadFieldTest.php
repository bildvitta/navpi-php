<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\UploadField;

class UploadFieldTest extends FieldsTestCase
{
    protected UploadField $uploadField;

    public function test_field_name()
    {
        $this->assertEquals('uploadField', $this->uploadField->getName());
    }

    public function test_field_type()
    {
        $this->assertEquals('upload', $this->uploadField->getType());
    }

    public function test_field_multiple()
    {
        $this->uploadField->multiple();
        $this->assertEquals(true, $this->getProperty($this->uploadField, 'multiple'));
    }

    public function test_fields_entity()
    {
        $entity = 'application/pdf';
        $this->uploadField->entity($entity);

        $this->assertEquals($entity, $this->getProperty($this->uploadField, 'entity'));
    }

    public function test_fields_extensions()
    {
        $extensions = 'pdf';
        $this->uploadField->extensions($extensions);

        $this->assertEquals($extensions, $this->getProperty($this->uploadField, 'extensions'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->uploadField = new UploadField('uploadField');
    }
}
