<?php

namespace Bildvitta\Navpi\Fields;

abstract class Field
{
    protected $parameters;
    protected $except_actions;
    protected $multiple_relation_key = null;
    protected $relation_key = null;
    protected $children_resource_class = null;

    public function __construct($name, $type, $parameters = [])
    {
        $this->parameters = $parameters;
        $this->addParameter('name', $name);
        $this->addParameter('type', $type);

        $this->except_actions = [];
    }

    protected function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    public function toArray()
    {
        return $this->parameters;
    }

    public function label($value)
    {
        return $this->addParameter('label', $value);
    }

    public function default($value)
    {
        return $this->addParameter('default', $value);
    }

    public function hint($value)
    {
        return $this->addParameter('hint', $value);
    }

    public function readOnly($value)
    {
        return $this->addParameter('read_only', $value);
    }

    public function disabled($value = true)
    {
        return $this->addParameter("disabled", $value);
    }

    public function required($value)
    {
        return $this->addParameter('required', $value);
    }

    public function exceptActions($except_actions)
    {
        $this->except_actions = $except_actions;
        return $this;
    }

    public function hasExceptAction($action)
    {
        return in_array($action, $this->except_actions);
    }

    public function getMultipleRelationKey()
    {
        return $this->multiple_relation_key;
    }

    public function relationKey($relation_key='id')
    {
        $this->relation_key = $relation_key;
        return $this;
    }

    public function getRelationKey()
    {
        return $this->relation_key;
    }

    public function childrenResourceClass()
    {
        return $this->children_resource_class;
    }
}
