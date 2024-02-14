<?php
/**
 * Lucy09Alex
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Lucy09Alex.com license that is
 * available through the world-wide-web at this URL:
 * https://www.Lucy09Alex.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Lucy09Alex
 * @package     Lucy09Alex_Employ
 * @copyright   Copyright (c) Lucy09Alex (https://www.Lucy09Alex.com/)
 * @license     https://www.Lucy09Alex.com/LICENSE.txt
 */

namespace Lucy09Alex\Employ\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Lucy09Alex\Employ\Controller\Index
 */
class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public $_resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory

     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory

    ) {

        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }


    /* @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()

    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Employee'));
        return $resultPage;
    }
}
