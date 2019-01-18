<?php

namespace Ampersand\Stores\Api;

use Ampersand\Stores\Api\Data\StoreInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface StoreRepositoryInterface
{
    public function save(StoreInterface $store);

    public function getById($storeId);

    public function getList(SearchCriteriaInterface $searchCriteria);

    public function delete(StoreInterface $store);

    public function deleteById($storeId);
}
