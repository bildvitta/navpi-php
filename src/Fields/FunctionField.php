<?php

namespace Bildvitta\Navpi\Fields;

class FunctionField extends Field
{
    protected array $functionParams = [];

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
}
