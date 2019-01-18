<?php

namespace Ampersand\Stores\Controller\Adminhtml\Store;

class Delete extends \Ampersand\Stores\Controller\Adminhtml\Store
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('store_id');

        if (!$id) {
            $this->messageManager->addErrorMessage(__('We can\'t find a store to delete.'));
            return $resultRedirect->setPath('*/*/');
        }

        try {
            $model = $this->_objectManager->create('Ampersand\Stores\Model\Store');
            $model->load($id);
            $model->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the store.'));
            return $resultRedirect->setPath('*/*/');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $resultRedirect->setPath('*/*/edit', ['store_id' => $id]);
        }
    }
}
