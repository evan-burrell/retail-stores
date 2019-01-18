<?php

namespace Ampersand\Stores\Setup;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Store\Model\Store;
use Magento\Theme\Model\Config;
use Magento\Theme\Model\ResourceModel\Theme\CollectionFactory;

class InstallData implements InstallDataInterface
{
    const THEME_NAME = 'Ampersand/default';

    private $config;
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory, Config $config)
    {
        $this->collectionFactory = $collectionFactory;
        $this->config = $config;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->assignTheme();
        $setup->endSetup();
    }

    protected function assignTheme()
    {
        $themes = $this->collectionFactory->create()->loadRegisteredThemes();
        foreach ($themes as $theme) {
            if ($theme->getCode() == self::THEME_NAME) {
                $this->config->assignToStore(
                    $theme,
                    [Store::DEFAULT_STORE_ID],
                    ScopeConfigInterface::SCOPE_TYPE_DEFAULT
                );
            }
        }
    }
}
