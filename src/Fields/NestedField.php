<?php


namespace Bildvitta\Navpi\Fields;

class NestedField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'nested');
    }

    public function children($children_resource_class)
    {
        $this->children_resource_class = $children_resource_class;
        return $this;
    }
}
