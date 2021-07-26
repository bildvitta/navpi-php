<?php

namespace Bildvitta\Navpi\Fields;

class EmailField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'email');
    }

    public function prefix($value)
    {
        return $this->addParameter('prefix', $value);
    }

    public function suffix($value)
    {
        return $this->addParameter('suffix', $value);
    }
}
