<?php

namespace Ampersand\Stores\Controller\Adminhtml\Store;

class NewAction extends \Ampersand\Stores\Controller\Adminhtml\Store
{
    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();

        return $resultForward->forward('edit');
    }
}
