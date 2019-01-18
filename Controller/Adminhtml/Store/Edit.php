<?php

namespace Ampersand\Stores\Controller\Adminhtml\Store;

class Edit extends \Ampersand\Stores\Controller\Adminhtml\Store
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('store_id');
        $model = $this->_objectManager->create('Ampersand\Stores\Model\Store');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This store no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->coreRegistry->register('ampersand_stores_store', $model);
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Store') : __('New Store'),
            $id ? __('Edit Store') : __('New Store')
        );
        $resultPage->getConfig()->getTitle()->prepend(__("Retail Stores"));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Store'));
        return $resultPage;
    }
}
