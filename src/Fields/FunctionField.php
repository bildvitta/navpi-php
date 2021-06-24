<?php


namespace Bildvitta\Navpi\Fields;


class FunctionField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'function');
    }
}
