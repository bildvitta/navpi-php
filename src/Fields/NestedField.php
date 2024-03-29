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
    
    public function options($value, $parsed = false)
    {
        if ($parsed) {
            return $this->addParameter('options', $value);
        }

        $options = [];
        foreach ($value as $key => $label) {
            array_push($options, [
                'label' => $label,
                'value' => $key
            ]);
        }
        return $this->addParameter('options', $options);
    }
}
