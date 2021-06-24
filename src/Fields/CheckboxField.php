<?php

namespace Bildvitta\Navpi\Fields;

class CheckboxField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'checkbox');
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
