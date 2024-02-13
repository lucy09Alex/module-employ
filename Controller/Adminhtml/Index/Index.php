<?php
/**
 * Mangoit
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mangoit.com license that is
 * available through the world-wide-web at this URL:
 * https://www.Mangoit.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mangoit
 * @package     Mangoit_Employ
 * @copyright   Copyright (c) Mangoit (https://www.Mangoit.com/)
 * @license     https://www.Mangoit.com/LICENSE.txt
 */

namespace Mangoit\Employ\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Mangoit\Employ\Controller\Index
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
