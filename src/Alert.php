<?php

namespace Depsimon\Alerts;

class Alert implements \ArrayAccess
{
    public $title;

    public $message;

    public $type = 'info';

    public $uid;

    public function __construct($attributes = [])
    {
        $this->uid = '_' . str_random(9);
        $this->update($attributes);
    }

    public function update($attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
            $this->$key = $attribute;
        }

        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
        return $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        //
    }
}