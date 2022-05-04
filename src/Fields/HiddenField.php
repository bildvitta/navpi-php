<?php

namespace Bildvitta\Navpi\Fields;

class HiddenField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'hidden');
    }
}
