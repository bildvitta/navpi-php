<?php

namespace Bildvitta\Navpi;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

    /**
     * @param  null  $action
     * @param  null  $resource
     */
    public function __construct($action = null, $resource = null)
    {
        parent::__construct($resource);

        $this->action = $action;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
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
     *
     * @return array
     */
    public function with($request)
    {
        if ($fields = $this->fields()) {
            $this->addWith('fields', $fields);
        }

        $results = $this->results();

        if ($this->resource instanceof Collection) {
            $this->addWith('results', $results);
        } elseif ($results) {
            $this->addWith('result', $results[0]);
        }

        if ($this->errors) {
            $this->addWith('errors', $this->errors);
        }

        if ($this->metadata) {
            $this->addWith('metadata', $this->metadata);
        }

        return $this->withs;
    }

    public function fields()
    {
        if (is_null($this->action)) {
            return [];
        }

        $fields = [];
        $fields_map = $this->fieldsMap();

        foreach ($fields_map as $name => $field) {
            if (request()->has('attributes')) {
                $attributes = request()->get('attributes');

                if (is_array($attributes) && ! in_array($name, $attributes)) {
                    continue;
                }
            } else {
                if (! $field->hasAction($this->action)) {
                    continue;
                }
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

        $attributes = collect(request()->get('attributes'));

        foreach ($resources as $resource) {
            foreach ($fields_map as $name => $field) {
                $relationshipMethod = method_exists($resource, $name) ? $name : Str::camel($name);

                if (request()->has('attributes')) {
                    if ($attributes->search($name) !== false) {
                        if ($children_resource_class = $field->childrenResourceClass()) {
                            $children_resource = new $children_resource_class($this->action, $resource->$relationshipMethod()->get());
                            $relationshipResults = collect($children_resource->results());

                            if (in_array(get_class($resource->$relationshipMethod()), [BelongsTo::class, HasOne::class, HasOneThrough::class])) {
                                $item[$name] = $relationshipResults->first();
                            } else {
                                $item[$name] = $relationshipResults->toArray();
                            }

                            continue;
                        }
                        if ($multiple_relation_key = $field->getMultipleRelationKey()) {
                            $related_list = $resource->$relationshipMethod();

                            if ($related_list instanceof Collection) {
                                $item[$name] = $related_list->pluck($multiple_relation_key);
                            } else {
                                $item[$name] = $related_list->get([$multiple_relation_key])->pluck($multiple_relation_key);
                            }
                            continue;
                        }
                        if ($relation_key = $field->getRelationKey()) {
                            if ($related_model = $resource->$relationshipMethod()->first([$relation_key])) {
                                $item[$name] = $related_model->$relation_key;
                            } else {
                                $item[$name] = null;
                            }
                            continue;
                        }
                        if ($pivot = $field->getPivot()) {
                            if (! is_null($resource->pivot) && in_array($pivot, array_keys($resource->pivot->attributesToArray()))) {
                                $item[$name] = $resource->pivot->$pivot;
                            }
                            continue;
                        }
                        if ($field->getType() == 'function') {
                            $item[$name] = $resource->$name($field->getFunctionParams());
                            continue;
                        }

                        if ($field->getType() == 'date') {
                            if (! is_null($resource->$name)) {
                                $item[$name] = Carbon::parse($resource->$name)->format('Y-m-d');
                            } else {
                                $item[$name] = $resource->$name;
                            }
                            continue;
                        }

                        $item[$name] = $resource->$name;
                    }
                } else {
                    if (! $field->hasAction($this->action)) {
                        continue;
                    }
                    if ($children_resource_class = $field->childrenResourceClass()) {
                        $children_resource = new $children_resource_class($this->action, $resource->$relationshipMethod()->get());
                        $relationshipResults = collect($children_resource->results());

                        if (in_array(get_class($resource->$relationshipMethod()), [BelongsTo::class, HasOne::class, HasOneThrough::class])) {
                            $item[$name] = $relationshipResults->first();
                        } else {
                            $item[$name] = $relationshipResults->toArray();
                        }

                        continue;
                    }
                    if ($multiple_relation_key = $field->getMultipleRelationKey()) {
                        $related_list = $resource->$relationshipMethod();

                        if ($related_list instanceof Collection) {
                            $item[$name] = $related_list->pluck($multiple_relation_key);
                        } else {
                            $item[$name] = $related_list->get([$multiple_relation_key])->pluck($multiple_relation_key);
                        }
                        continue;
                    }
                    if ($relation_key = $field->getRelationKey()) {
                        if ($related_model = $resource->$relationshipMethod()->first([$relation_key])) {
                            $item[$name] = $related_model->$relation_key;
                        } else {
                            $item[$name] = null;
                        }
                        continue;
                    }
                    if ($pivot = $field->getPivot()) {
                        if (! is_null($resource->pivot) && in_array($pivot, array_keys($resource->pivot->attributesToArray()))) {
                            $item[$name] = $resource->pivot->$pivot;
                        }
                        continue;
                    }
                    if ($field->getType() == 'function') {
                        $item[$name] = $resource->$name($field->getFunctionParams());
                        continue;
                    }

                    if ($field->getType() == 'date') {
                        if (! is_null($resource->$name)) {
                            $item[$name] = Carbon::parse($resource->$name)->format('Y-m-d');
                        } else {
                            $item[$name] = $resource->$name;
                        }
                        continue;
                    }

                    $item[$name] = $resource->$name;
                }
            }

            $results[] = $item;
        }

        return $results;
    }

    public function toResponse($request)
    {
        $response = parent::toResponse($request);
        $response->setStatusCode($this->status['code']);

        return $response;
    }

    public function addMetadata($key, $value)
    {
        $this->metadata[$key] = $value;

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
