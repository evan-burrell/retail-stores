<?php

namespace Ampersand\Stores\Model\Store\Type;

use Magento\Framework\Data\OptionSourceInterface;

class OptionsProvider implements OptionSourceInterface
{
    /** @var Registry */
    private $typeRegistry;

    /**
     * OptionsProvider constructor.
     *
     * @param Registry $typeRegistry
     */
    public function __construct(Registry $typeRegistry)
    {
        $this->typeRegistry = $typeRegistry;
    }

    /**
     * @return array
     */
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
