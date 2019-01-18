<?php

namespace Ampersand\Stores\Controller\Adminhtml\Store;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    /** @var \Magento\Framework\App\Request\DataPersistorInterface */
    protected $dataPersistor;

    /**
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface; $dataPersistor
     */
    public function __construct(Context $context, DataPersistorInterface $dataPersistor)
    {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $resultRedirect->setPath('*/*/');
        }

        $id = $this->getRequest()->getParam('store_id');
        $model = $this->_objectManager->create('Ampersand\Stores\Model\Store')->load($id);

        if (!$model->getId() && $id) {
            $this->messageManager->addErrorMessage(__('This store no longer exists.'));

            return $resultRedirect->setPath('*/*/');
        }

        $model->setData($data);
        $model->save();

        try {
            $model->save();

            $this->messageManager->addSuccessMessage(__('You saved the store.'));
            $this->dataPersistor->clear('ampersand_stores_store');

            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['store_id' => $model->getId()]);
            }

            return $resultRedirect->setPath('*/*/');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the store.'));
        }

        $this->dataPersistor->set('ampersand_stores_store', $data);

        return $resultRedirect->setPath('*/*/edit', ['store_id' => $this->getRequest()->getParam('store_id')]);
    }
}
