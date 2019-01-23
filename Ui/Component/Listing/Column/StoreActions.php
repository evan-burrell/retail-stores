<?php

namespace Ampersand\Stores\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class StoreActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_PATH_EDIT = 'ampersand_stores/store/edit';
    const URL_PATH_DELETE = 'ampersand_stores/store/delete';
    const URL_PATH_DETAILS = 'ampersand_stores/store/details';

    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * StoreActions constructor.
     *
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as &$item) {
            if (!isset($item['store_id'])) {
                continue;
            }

            $item[$this->getData('name')] = [
                'edit' => [
                    'href' => $this->urlBuilder->getUrl(
                        static::URL_PATH_EDIT,
                        [
                            'store_id' => $item['store_id'],
                        ]
                    ),
                    'label' => __('Edit'),
                ],
                'delete' => [
                    'href' => $this->urlBuilder->getUrl(
                        static::URL_PATH_DELETE,
                        [
                            'store_id' => $item['store_id'],
                        ]
                    ),
                    'label'   => __('Delete'),
                    'confirm' => [
                        'title'   => __('Delete "${ $.$data.name }"'),
                        'message' => __('Are you sure you want to delete a "${ $.$data.name }" store record?'),
                    ],
                ],
            ];
        }

        return $dataSource;
    }
}
