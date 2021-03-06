<?php

namespace Ampersand\Stores\Model;

use Ampersand\Stores\Api\Data\StoreInterface;
use Ampersand\Stores\Api\Data\StoreInterfaceFactory;
use Ampersand\Stores\Api\StoreRepositoryInterface;
use Ampersand\Stores\Model\ResourceModel\Store as ResourceStore;
use Ampersand\Stores\Model\ResourceModel\Store\CollectionFactory as StoreCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class StoreRepository implements StoreRepositoryInterface
{
    /** @var ResourceStore */
    protected $resource;
    /** @var StoreFactory */
    protected $storeFactory;
    /** @var StoreCollectionFactory */
    protected $storeCollectionFactory;
    /** @var SearchResultsInterfaceFactory */
    protected $searchResultsFactory;
    /** @var DataObjectHelper */
    protected $dataObjectHelper;
    /** @var DataObjectProcessor */
    protected $dataObjectProcessor;
    /** @var StoreInterfaceFactory */
    protected $dataStoreFactory;
    /** @var StoreManagerInterface */
    private $storeManager;

    /**
     * StoreRepository constructor.
     *
     * @param ResourceStore                 $resource
     * @param StoreFactory                  $storeFactory
     * @param StoreInterfaceFactory         $dataStoreFactory
     * @param StoreCollectionFactory        $storeCollectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper              $dataObjectHelper
     * @param DataObjectProcessor           $dataObjectProcessor
     * @param StoreManagerInterface         $storeManager
     */
    public function __construct(
        ResourceStore $resource,
        StoreFactory $storeFactory,
        StoreInterfaceFactory $dataStoreFactory,
        StoreCollectionFactory $storeCollectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->storeFactory = $storeFactory;
        $this->storeCollectionFactory = $storeCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataStoreFactory = $dataStoreFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * @param StoreInterface $store
     *
     * @return StoreInterface
     */
    public function save(StoreInterface $store)
    {
        try {
            $this->resource->save($store);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the store: %1',
                $exception->getMessage()
            ));
        }

        return $store;
    }

    /**
     * @param int $storeId
     *
     * @return StoreInterface
     */
    public function getById($storeId)
    {
        $store = $this->storeFactory->create();
        $this->resource->load($store, $storeId);

        if (!$store->getId()) {
            throw new NoSuchEntityException(__('Store with id "%1" does not exist.', $storeId));
        }

        return $store;
    }

    /**
     * @param SearchCriteriaInterface|null $criteria
     *
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria = null)
    {
        $collection = $this->storeCollectionFactory->create();
        $searchResults = $this->searchResultsFactory->create();

        if ($criteria) {
            foreach ($criteria->getFilterGroups() as $filterGroup) {
                $fields = [];
                $conditions = [];

                foreach ($filterGroup->getFilters() as $filter) {
                    if ($filter->getField() === 'store_id') {
                        $collection->addStoreFilter($filter->getValue(), false);
                        continue;
                    }

                    $fields[] = $filter->getField();
                    $condition = $filter->getConditionType() ?: 'eq';
                    $conditions[] = [$condition => $filter->getValue()];
                }

                $collection->addFieldToFilter($fields, $conditions);
            }

            $sortOrders = $criteria->getSortOrders();
            if ($sortOrders) {
                /** @var SortOrder $sortOrder */
                foreach ($sortOrders as $sortOrder) {
                    $collection->addOrder(
                        $sortOrder->getField(),
                        ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                    );
                }
            }

            $collection->setCurPage($criteria->getCurrentPage());
            $collection->setPageSize($criteria->getPageSize());

            $searchResults->setSearchCriteria($criteria);
        }

        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }

    /**
     * @param StoreInterface $store
     *
     * @return bool
     */
    public function delete(StoreInterface $store)
    {
        try {
            $this->resource->delete($store);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Store: %1',
                $exception->getMessage()
            ));
        }

        return true;
    }

    /**
     * @param int $storeId
     *
     * @return bool
     */
    public function deleteById($storeId)
    {
        return $this->delete($this->getById($storeId));
    }
}
