<?php

namespace Bildvitta\Navpi\Fields;

class DateField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'date');
    }
}
