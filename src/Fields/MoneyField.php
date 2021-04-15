<?php

namespace Bildvitta\Navpi\Fields;

class MoneyField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'money');
    }

    public function places($value)
    {
        return $this->addParameter('places', $value);
    }

    public function min($value)
    {
        return $this->addParameter('min', $value);
    }

    public function max($value)
    {
        return $this->addParameter('max', $value);
    }
}
