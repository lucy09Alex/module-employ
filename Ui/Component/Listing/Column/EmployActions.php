<?php
/**
 * Copyright © Lucy09Alex Technologies Pvt Ltd. All rights reserved.
 * 
 */

namespace Lucy09Alex\Employ\Ui\Component\Listing\Column;

use Lucy09Alex\Employ\Helper\Data;
use Magento\Framework\Serialize\Serializer\Json;
use Psr\Log\LoggerInterface;

class EmployActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var helper/data
     */
    protected $_helper;

    /**
     * @var LoggerInterface
     */
    private $_logger;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    protected $_json;

    const URL_EDIT_PATH = 'emp/index/edit';
    const URL_DELETE_PATH = 'emp/index/delete';



    /**
     * to save data in database
     * @param $context
     * @param $urlBuilder
     * @param $uiComponentFactory
     * @param $data
     * @param $json
     * 
     */
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        Json $json,
        LoggerInterface $logger,
        Data $helper,
        array $components = [],
        array $data = []

    ) {
        $this->urlBuilder = $urlBuilder;
        $this->_json = $json;
        $this->_helper = $helper;
        $this->_logger = $logger;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {

                if (isset($item['emp_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_EDIT_PATH,
                                [
                                    'emp_id' => $item['emp_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_DELETE_PATH,
                                [
                                    'emp_id' => $item['emp_id']
                                ]
                            ),
                            'label' => __('Delete')
                        ],
                    ];
                }
            }
            
        }
        return $dataSource;
    }
}