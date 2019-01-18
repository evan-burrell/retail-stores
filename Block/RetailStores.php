<?php

namespace Ampersand\Stores\Block;

use Ampersand\Stores\Model\StoreFactory;
use Magento\Framework\View\Element\Template\Context;

class RetailStores extends \Magento\Framework\View\Element\Template
{
    private $_storeFactory;

    public function __construct(Context $context, StoreFactory $storeFactory, array $data = [])
    {
        $this->_storeFactory = $storeFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->_storeFactory->create()->getCollection();
    }

    public function getSingleStoreUrl($storeId)
    {
        return '/stores/index/view/store_id/'.$storeId;
    }

    public function formatHours($time)
    {
        return date('H:i', strtotime($time));
    }

    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Retail Stores'));

        return $this;
    }
}
