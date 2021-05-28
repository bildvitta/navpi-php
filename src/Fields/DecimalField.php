<?php

namespace Bildvitta\Navpi\Fields;

class DecimalField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'decimal');
    }

    public function mask($value)
    {
        return $this->addParameter('mask', $value);
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
