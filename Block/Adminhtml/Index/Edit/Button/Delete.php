<?php
/**
 * Copyright © Mangoit Technologies Pvt Ltd. All rights reserved.
 * delete button code for custom form's delete operations
 */

namespace Mangoit\Employ\Block\Adminhtml\Index\Edit\Button;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    protected $_context;

    /**
     * @param Context $context
     * @param AuthorRepositoryInterface $authorRepository
     */

    public function __construct(
        Context $context
    ) {
        $this->_context = $context;
    }

    /**
     * get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        $empId = $this->_context->getRequest()->getParam('emp_id');
        if ($empId) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * to delete url for specific row 
     * @return string
     */
    public function getDeleteUrl()
    {
        $empId = $this->_context->getRequest()->getParam('emp_id');
        return $this->getUrl('*/*/delete', ['emp_id' => $empId]);
    }
}
