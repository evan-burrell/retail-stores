<?php

namespace Ampersand\Stores\Block;

use Ampersand\Stores\Model\StoreRepository;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class Store.
 */
class Store extends \Magento\Framework\View\Element\Template
{
    /** @var Ampersand\Stores\Model\StoreRepository */
    private $storeRepository;

    /**
     * Store constructor.
     *
     * @param Magento\Framework\View\Element\Template\Context $context
     * @param Ampersand\Stores\Model\StoreRepository          $storeRepository
     * @param array                                           $data
     */
    public function __construct(Context $context, StoreRepository $storeRepository, array $data = [])
    {
        $this->storeRepository = $storeRepository;
        parent::__construct($context, $data);
    }

    /**
     * @param Magento\Catalog\Api\Data\ProductInterface $product
     *
     * @return \Ampersand\Stores\Api\Data\StoreInterface|void
     */
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
