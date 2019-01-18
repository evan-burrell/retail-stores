<?php

namespace Ampersand\Stores\Block;

use Ampersand\Stores\Model\StoreRepository;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\View\Element\Template\Context;

class Store extends \Magento\Framework\View\Element\Template
{
    private $storeRepository;

    public function __construct(Context $context, StoreRepository $storeRepository, array $data = [])
    {
        $this->storeRepository = $storeRepository;
        parent::__construct($context, $data);
    }

    public function getStore(ProductInterface $product)
    {
        $storeAttribute = $product->getCustomAttribute('retail_store');

        $storeId = ($storeAttribute !== null)
            ? $storeAttribute->getValue()
            : null;

        if (!$storeId) {
            return;
        }

        $store = $this->storeRepository->getById($storeId);

        return $store;
    }
}
