<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Pluralizer;

class Pluralize implements CastsAttributes{

    protected $count;

    function __construct($count = 0){
        $this->$count;
    }

    public function get($model, string $key, $value, array $attributes)
    {
        return Pluralizer::plural($value, $this->count);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
