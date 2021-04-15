<?php

namespace Bildvitta\Navpi\Fields;

class SelectField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'select');
    }

    public function options($value)
    {
        $options = [];
        foreach ($value as $key => $value) {
            array_push($options, [
                'label' => $value,
                'value' => $key
            ]);
        }
        return $this->addParameter('options', $options);
    }

    public function multiple($relation_key=null)
    {
        $this->multiple_relation_key = $relation_key;
        return $this->addParameter('multiple', true);
    }
}
