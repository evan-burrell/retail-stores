<?php

namespace Ampersand\Stores\Setup;

use Ampersand\Stores\Model\ResourceModel\Store;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable(Store::TABLE)
        );

        $table->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary'  => true,
                'unsigned' => true,
            ],
            'Store ID'
        )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable => false'],
                'Store Name'
            )
            ->addColumn(
                'address_line_1',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Store Address Line 1'
            )
            ->addColumn(
                'address_line_2',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Store Address Line 2'
            )
            ->addColumn(
                'postcode',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Postcode'
            )
            ->addColumn(
                'latitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                null,
                [],
                'Latitude'
            )
            ->addColumn(
                'longitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                null,
                [],
                'Longitude'
            )
            ->addColumn(
                'opening',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                255,
                [],
                'Opening Hours'
            )
            ->addColumn(
                'closing',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                255,
                [],
                'closing Hours'
            )
            ->setComment('Stores Table');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
