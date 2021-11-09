<?php

namespace Bildvitta\Navpi\Tests\Fields;

use Bildvitta\Navpi\Fields\Field;
use Bildvitta\Navpi\Tests\TestCase;

abstract class FieldsTestCase extends TestCase
{
    protected function getProperty(Field $field, string $property)
    {
        return $field->toArray()[$property];
    }
}
