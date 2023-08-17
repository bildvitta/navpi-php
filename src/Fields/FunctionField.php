<?php

namespace Bildvitta\Navpi\Fields;

class FunctionField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'function');
    }

    public function setParameter($key, $value)
    {
        $this->functionParams[$key] = $value;
        return $this;
    }

    public function getFunctionParams()
    {
        return $this->functionParams;
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
