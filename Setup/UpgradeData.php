<?php

namespace Ampersand\Stores\Setup;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /** @var EavSetupFactory */
    private $eavSetupFactory;

    /**
     * UpgradeData constructor.
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $this->createProductStoreAttribute($setup);
            $this->addProductStoreAttributeToAttributeSets(
                $setup,
                'retail_store',
                []
            );
        }
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    private function createProductStoreAttribute(ModuleDataSetupInterface $setup)
    {
        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'retail_store',
            [
                'label'                   => 'Store',
                'input'                   => 'select',
                'type'                    => 'text',
                'source'                  => 'Ampersand\Stores\Model\Store\Type\SourceOptions',
                'required'                => false,
                'global'                  => ScopedAttributeInterface::SCOPE_GLOBAL,
                'filterable'              => false,
                'used_in_product_listing' => true,
                'visible_on_front'        => true,
            ]
        );
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param string                   $attribute
     * @param array                    $attributeSets
     */
    public function addProductStoreAttributeToAttributeSets(
        ModuleDataSetupInterface $setup,
        string $attribute,
        array $attributeSets
    ) {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        foreach ($attributeSets as $set) {
            $eavSetup->addAttributeToSet(
                \Magento\Catalog\Model\Product::ENTITY,
                'Default',
                'Product Details',
                $attribute
            );
        }
    }
}
