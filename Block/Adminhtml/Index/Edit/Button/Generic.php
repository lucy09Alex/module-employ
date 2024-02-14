<?php
/**
 * Copyright © Lucy09Alex Technologies Pvt Ltd. All rights reserved.
 * Generic button code for custom form's Generic operations
 */

namespace Lucy09Alex\Employ\Block\Adminhtml\Index\Edit\Button;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Generic
 */
class Generic
{
    /**
     * @var Context
     */
    protected $_context;

    /**
     * @var PageRepositoryInterface
     */
    protected $_pageRepository;

    /**
     * @param Context $context
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(
        Context $context,
        PageRepositoryInterface $pageRepository
    ) {
        $this->_context = $context;
        $this->_pageRepository = $pageRepository;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->_context->getUrlBuilder()->getUrl($route, $params);
    }
}
