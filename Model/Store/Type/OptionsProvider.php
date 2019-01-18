<?php

namespace Ampersand\Stores\Model\Store\Type;

use Magento\Framework\Data\OptionSourceInterface;

class OptionsProvider implements OptionSourceInterface
{
    private $typeRegistry;

    public function __construct(Registry $typeRegistry)
    {
        $this->typeRegistry = $typeRegistry;
    }

    public function toOptionArray()
    {
        $options = [];

        foreach ($this->typeRegistry->getTypes() as $value => $label) {
            $options[$value] = [
                'value' => $value,
                'label' => $label,
            ];
        }

        return $options;
    }
}
