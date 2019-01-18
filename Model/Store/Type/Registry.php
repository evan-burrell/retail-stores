<?php

namespace Ampersand\Stores\Model\Store\Type;

class Registry
{
    private $types;

    public function __construct(array $types = [])
    {
        $this->types = $types;
    }

    public function getTypes()
    {
        return $this->types;
    }
}
