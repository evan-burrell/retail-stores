<?php

namespace Ampersand\Stores\Block\Adminhtml\Store\Edit;

use Magento\Backend\Block\Widget\Context;

/**
 * Class GenericButton.
 */
abstract class GenericButton
{
    /** @var \Magento\Backend\Block\Widget\Context */
    protected $context;

    /**
     * GenericButton constructor.
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * @return int | null
     */
    public function getModelId()
    {
        return $this->context->getRequest()->getParam('store_id');
    }

    /**
     * @param string $route
     * @param array  $params
     *
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
