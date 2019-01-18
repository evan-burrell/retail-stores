<?php

namespace Ampersand\Stores\Api;

use Ampersand\Stores\Api\Data\StoreInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface StoreRepositoryInterface
{
    /**
     * @param \Ampersand\Stores\Api\Data\StoreInterface $store
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function save(StoreInterface $store);

    /**
     * @param int $storeId
     * @return \Ampersand\Stores\Api\Data\StoreInterface
     */
    public function getById($storeId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Ampersand\Stores\Api\Data\StoreInterface $store
     * @return boolean
     */
    public function delete(StoreInterface $store);

    /**
     * @param int $storeId
     * @return boolean
     */
    public function deleteById($storeId);
}
