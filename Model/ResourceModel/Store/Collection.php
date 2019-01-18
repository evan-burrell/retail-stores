<?php

namespace Ampersand\Stores\Model\ResourceModel\Store;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Ampersand\Stores\Model\Store',
            'Ampersand\Stores\Model\ResourceModel\Store'
        );
    }
}
