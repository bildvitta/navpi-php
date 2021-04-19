<?php

namespace Bildvitta\Navpi;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

abstract class NavpiResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'status';
    protected $withs = [];
    protected $action = null;
    protected $metadata = [];
    protected $errors = [];
    protected $status = [
        'code' => 200
    ];

    public function __construct($action = null, $resource = null)
    {
        parent::__construct($resource);

        $this->action = $action;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->status;
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  Request  $request
     * @return array
     */
    public function with($request)
    {
        if ($fields = $this->fields()) {
            $this->addWith('fields', $fields);
        }

        if ($results = $this->results()) {
            if ($this->resource instanceof Collection) {
                $this->addWith('results', $results);
            } else {
                $this->addWith('result', $results[0]);
            }
        }

        if ($this->errors) {
            $this->addWith('errors', $this->errors);
        }

        if ($this->metadata) {
            $this->addWith('metadata', $this->metadata);
        }

        return $this->withs;
    }

    public function toResponse($request) {
        $response = parent::toResponse($request);
        $response->setStatusCode($this->status['code']);
        return $response;
    }

    public function fields()
    {
        if (is_null($this->action)) {
            return [];
        }

        $fields = [];

        $fields_map = $this->fieldsMap();
        foreach ($fields_map as $name => $field) {
            if ($field->hasExceptAction($this->action)) {
                continue;
            }

            $item = $field->toArray();

            if ($children_resource_class = $field->childrenResourceClass()) {
                $children_resource = new $children_resource_class($this->action);
                $item['children'] = $children_resource->fields();
            }

            $fields[$name] = $item;
        }

        return $fields;
    }

    abstract protected function fieldsMap();

    public function addWith($key, $value)
    {
        $this->withs[$key] = $value;
        return $this;
    }

    public function results()
    {
        if (is_null($this->resource)) {
            return [];
        }

        if (is_null($this->action)) {
            return [];
        }

        $results = [];

        $fields_map = $this->fieldsMap();
        $resources = ($this->resource instanceof Collection) ? $this->resource : [$this->resource];
        foreach ($resources as $resource) {
            $item = [];

            foreach ($fields_map as $name => $field) {
                if ($field->hasExceptAction($this->action)) {
                    continue;
                }
                if ($children_resource_class = $field->childrenResourceClass()) {
                    $children_resource = new $children_resource_class($this->action, $resource->$name()->get());
                    $item[$name] = $children_resource->results();
                    continue;
                }
                if ($multiple_relation_key = $field->getMultipleRelationKey()) {
                    $item[$name] = $resource->$name()->get([$multiple_relation_key])->pluck($multiple_relation_key);
                    continue;
                }
                if ($relation_key = $field->getRelationKey()) {
                    $item[$name] = $resource->$name()->first([$relation_key])->$relation_key;
                    continue;
                }

                $item[$name] = $resource->$name;
            }

            $results[] = $item;
        }

        return $results;
    }

    public function addMetadata($key, $value)
    {
        $this->metadata[$key][] = $value;
        return $this;
    }

    public function addError($field_name, $message)
    {
        $this->errors[$field_name][] = $message;
        return $this;
    }

    public function status($code, $text = null)
    {
        $this->status['code'] = $code;
        if ($text) {
            $this->status['text'] = $text;
        } else {
            unset($this->status['text']);
        }
        return $this;
    }

    public function count($value)
    {
        $this->addWith('count', $value);
        return $this;
    }
}
