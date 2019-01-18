<?php

namespace Ampersand\Stores\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends Action
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('store_id');
        $model = $this->_objectManager->create('Ampersand\Stores\Model\Store');
        $model->load($id);
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('Store not found'));

                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/');
            }
        }

        return $this->resultPageFactory->create();
    }
}
