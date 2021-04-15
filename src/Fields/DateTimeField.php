<?php

namespace Bildvitta\Navpi\Fields;

class DateTimeField extends DateField
{
    public function __construct($name)
    {
        parent::__construct($name, 'datetime');
    }
}
