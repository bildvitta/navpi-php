<?php

namespace Bildvitta\Navpi\Fields;

class TextAreaField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'textarea');
    }

    public function mask($value)
    {
        return $this->addParameter('mask', $value);
    }

    public function maxLength($value)
    {
        return $this->addParameter('max_length', $value);
    }

    public function minLength($value)
    {
        return $this->addParameter('min_length', $value);
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
