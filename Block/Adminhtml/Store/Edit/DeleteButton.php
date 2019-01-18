<?php

namespace Ampersand\Stores\Block\Adminhtml\Store\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        $data = [];
        if ($this->getModelId()) {
            $data = [
                'label'    => __('Delete Store'),
                'class'    => 'delete',
                'on_click' => 'deleteConfirm(\''.__(
                    'Are you sure you want to do this?'
                ).'\', \''.$this->getDeleteUrl().'\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['Store_id' => $this->getModelId()]);
    }
}
