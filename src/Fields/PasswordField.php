<?php

namespace Bildvitta\Navpi\Fields;

class PasswordField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'password');
    }

    public function pattern($value)
    {
        return $this->addParameter('pattern', $value);
    }
    
    public function hideStrengthChecker($value = true)
    {
        return $this->addParameter('hide_strength_checker', $value);
    }
}
