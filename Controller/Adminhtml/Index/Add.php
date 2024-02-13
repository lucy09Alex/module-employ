<?php
/**
 * Copyright © Mangoit Technologies Pvt Ltd. All rights reserved.
 * Add new data for Employ by rendering custom form
 */

namespace Mangoit\Employ\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New'));
        return $resultPage;
    }
}
