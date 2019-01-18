<?php

namespace Ampersand\Stores\Model\Store\Type;

use Ampersand\Stores\Model\StoreRepository;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Eav\Model\ResourceModel\Entity\AttributeFactory;

class SourceOptions extends AbstractSource
{
    private $storeRepository;
    private $eavAttrEntity;

    public function __construct(
        StoreRepository $storeRepository,
        AttributeFactory $eavAttrEntity
    ) {
        $this->storeRepository = $storeRepository;
        $this->eavAttrEntity = $eavAttrEntity;
    }

    /**
     * @retun array
     */
    public function getAllOptions()
    {
        $this->_options = [];
        $storeCollection = $this->storeRepository->getList();

        foreach ($storeCollection->getItems() as $store) {
            $this->_options[] = [
                'value' => $store->getId(),
                'label' => $store->getName(),
            ];
        }

        return $this->_options;
    }

    public function getFlatColumns()
    {
        $attributeCode = $this->getAttribute()->getAttributeCode();

        return [
            $attributeCode => [
                'default'  => null,
                'extra'    => null,
                'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => true,
            ],
        ];
    }

    /**
     * @param int $store
     *
     * @return \Magento\Framework\DB\Select
     */
    public function getFlatUpdateSelect($store)
    {
        return $this->eavAttrEntity->create()->getFlatUpdateSelect($this->getAttribute(), $store);
    }
}
