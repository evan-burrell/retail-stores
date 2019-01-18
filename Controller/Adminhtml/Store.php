<?php

namespace Ampersand\Stores\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

abstract class Store extends Action
{
    const ADMIN_RESOURCE = 'Ampersand_Stores::top_level';

    /** @var \Magento\Framework\RegistryRegistry */
    protected $coreRegistry;
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected $resultPageFactory;
    /** @var \Magento\Backend\Model\View\Result\ForwardFactory */
    protected $resultForwardFactory;

    /**
     * Store constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * @param $resultPage
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Ampersand'), __('Ampersand'))
            ->addBreadcrumb(__('Store'), __('Store'));

        return $resultPage;
    }
}
