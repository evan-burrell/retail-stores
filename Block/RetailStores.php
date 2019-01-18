<?php

namespace Ampersand\Stores\Block;

use Ampersand\Stores\Model\StoreFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class RetailStores extends Template
{
    /** @var \Ampersand\Stores\Model\StoreFactory */
    private $_storeFactory;

    /**
     * RetailStores constructor.
     *
     * @param Magento\Framework\View\Element\Template\Context $context
     * @param StoreFactory                                    $storeFactory
     * @param array                                           $data
     */
    public function __construct(Context $context, StoreFactory $storeFactory, array $data = [])
    {
        $this->_storeFactory = $storeFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getCollection()
    {
        return $this->_storeFactory->create()->getCollection();
    }

    /**
     * @param $storeId
     *
     * @return string
     */
    public function getSingleStoreUrl($storeId)
    {
        return '/stores/index/view/store_id/'.$storeId;
    }

    /**
     * @param $time
     *
     * @return string
     */
    public function formatHours($time)
    {
        return date('H:i', strtotime($time));
    }

    /**
     * @return $this
     */
    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Retail Stores'));

        return $this;
    }
}
