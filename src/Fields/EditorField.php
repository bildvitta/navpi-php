<?php

namespace Bildvitta\Navpi\Fields;

class EditorField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'editor');
    }
}
