<?php

namespace Bildvitta\Navpi\Fields;

abstract class Field
{
    protected $parameters;
    protected $enable_actions;
    protected $except_actions;
    protected $multiple_relation_key = null;
    protected $relation_key = null;
    protected $children_resource_class = null;
    protected $pivot = null;

    public function __construct($name, $type, $parameters = [])
    {
        $this->parameters = $parameters;
        $this->addParameter('name', $name);
        $this->addParameter('type', $type);

        $this->enable_actions = ["*"];
        $this->except_actions = [];
    }

    protected function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    public static function create($name)
    {
        return new static($name);
    }

    public function getType()
    {
        return $this->parameters['type'];
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
        return $this->addParameter('disable', $value);
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

    public function hasAction($action)
    {
        return !$this->hasExceptAction($action) && $this->hasEnableAction($action);
    }

    public function hasExceptAction($action)
    {
        return in_array($action, $this->except_actions);
    }

    public function hasEnableAction($action)
    {
        return in_array($action, $this->enable_actions) || in_array("*", $this->enable_actions);
    }

    public function getName()
    {
        return $this->parameters['name'];
    }

    public function enableActions($enable_actions)
    {
        $this->enable_actions = $enable_actions;
        return $this;
    }

    public function getMultipleRelationKey()
    {
        return $this->multiple_relation_key;
    }

    public function relationKey($relation_key = 'id')
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

    public function pivot($field = null)
    {
        if ($field) {
            $this->pivot = $field;
        } else {
            $this->pivot = $this->parameters['name'];
        }
        return $this;
    }

    public function getPivot()
    {
        return $this->pivot;
    }
}
