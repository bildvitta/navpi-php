<?php

namespace Bildvitta\Navpi\Fields;

class RadioField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'radio');
    }

    public function options($value, $parsed=false)
    {
        if ($parsed) {
            return $this->addParameter('options', $value);
        }

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
