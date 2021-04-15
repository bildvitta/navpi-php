<?php

namespace Bildvitta\Navpi\Fields;

class CheckboxField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'checkbox');
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
}
