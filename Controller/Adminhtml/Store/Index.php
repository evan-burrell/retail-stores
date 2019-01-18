<?php

namespace Ampersand\Stores\Controller\Adminhtml\Store;

class Index extends \Ampersand\Stores\Controller\Adminhtml\Store
{
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Retail Stores'));

        return $resultPage;
    }
}
