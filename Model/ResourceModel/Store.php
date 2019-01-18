<?php

namespace Ampersand\Stores\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Store extends AbstractDb
{
    const TABLE = 'ampersand_stores_store';

    protected function _construct()
    {
        $this->_init(self::TABLE, 'store_id');
    }
}
