<?php

namespace Ampersand\Stores\Block;

use Ampersand\Stores\Model\StoreFactory;
use Magento\Catalog\Helper\Image;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;

class StoreView extends \Magento\Framework\View\Element\Template
{
    const DEFAULT_PAGE_SIZE = 10;
    private $_storeFactory;
    private $collectionFactory;
    private $imageHelper;

    public function __construct(
        Context $context,
        StoreFactory $storeFactory,
        CollectionFactory $collectionFactory,
        Image $imageHelper,

        array $data = []
    ) {
        $this->_storeFactory = $storeFactory;
        $this->collectionFactory = $collectionFactory;
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->_storeFactory->create()->getCollection()->addFieldToFilter('store_id', $this->getRequest()->getParam('store_id'));
    }

    public function getProducts()
    {
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : self::DEFAULT_PAGE_SIZE;

        $collection = $this->collectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('retail_store', $this->getRequest()->getParam('store_id'));
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function formatHours($time)
    {
        return date('H:i', strtotime($time));
    }

    public function isOpen($opening, $closing)
    {
        $currentTime = date('H:i');
        if ($opening < $currentTime && $currentTime < $closing) {
            return true;
        }

        return false;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function formatPrice($price)
    {
        return number_format((float) $price, 2, '.', '');
    }

    public function getImageUrl($product, $imageWidth, $imageHeight)
    {
        $url = $this->imageHelper->init($product, 'product_page_image_small')->setImageFile($product->getFile())->resize($imageWidth, $imageHeight)->getUrl();

        return $url;
    }

    public function _prepareLayout()
    {
        parent::_prepareLayout();
        parent::_prepareLayout();
        if ($this->getProducts()) {
            $pager = $this->getLayout()->createBlock('Magento\Theme\Block\Html\Pager', 'store.products')->setAvailableLimit([10 => 10, 20 => 20, 100 => 100])->setShowPerPage(true)->setCollection($this->getProducts());
            $this->setChild('pager', $pager);
            $this->getProducts()->load();
        }

        return $this;
    }
}
