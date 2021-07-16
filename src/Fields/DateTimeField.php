<?php

namespace Bildvitta\Navpi\Fields;

class DateTimeField extends DateField
{
    public function __construct($name)
    {
        Field::__construct($name, 'datetime');
    }
}
