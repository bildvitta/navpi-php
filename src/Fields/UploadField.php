<?php

namespace Bildvitta\Navpi\Fields;

class UploadField extends Field
{

    public function __construct($name)
    {
        parent::__construct($name, 'upload');
    }

    public function multiple($relation_key=null)
    {
        $this->multiple_relation_key = $relation_key;
        return $this->addParameter('multiple', true);
    }

    public function entity($value)
    {
        return $this->addParameter('entity', $value);
    }

    public function extensions($value)
    {
        return $this->addParameter('extensions', $value);
    }
}
