<?php

namespace Ampersand\Stores\Model\Store\Type;

class Registry
{
    /** @var array */
    private $types;

    /**
     * Registry constructor.
     *
     * @param array $types
     */
    public function __construct(array $types = [])
    {
        $this->types = $types;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }
}
