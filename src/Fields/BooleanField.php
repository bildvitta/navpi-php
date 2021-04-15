<?php

namespace Bildvitta\Navpi\Fields;

/**
 * Class BooleanField.
 *
 * @package App\Http\Resources\Navpi\Fields
 */
class BooleanField extends Field
{
    public function __construct($name)
    {
        parent::__construct($name, 'boolean');
    }
}
