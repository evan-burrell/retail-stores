<?php

namespace Ampersand\Stores\Controller\Adminhtml;

use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;

abstract class Store extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Ampersand_Stores::top_level';

    protected $coreRegistry;
    protected $resultPageFactory;
    protected $resultForwardFactory;

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

    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Ampersand'), __('Ampersand'))
            ->addBreadcrumb(__('Store'), __('Store'));

        return $resultPage;
    }
}
