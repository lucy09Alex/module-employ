<?php
/**
 * Copyright © Mangoit Technologies Pvt Ltd. All rights reserved.
 * Delete grid's multiple row data of Employ 
 */
namespace Mangoit\Employ\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Mangoit\Employ\Model\ResourceModel\Employ\CollectionFactory;
use Mangoit\Employ\Model\Employ;

class MassDelete extends \Magento\Backend\App\Action
{

    /**
     * @var Filter
     */
    protected $_filter;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var Employ
     */
    protected $_employModel;


    /**
     * @param Context
     * @param filter 
     * @param collectionFactory 
     * @param Employ 
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        Employ $employModel
    ) {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        $this->_employModel = $employModel;
        parent::__construct($context);
    }

    /**
     * to delete selected row of data
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $employData = $this->_collectionFactory->create();

        foreach ($employData as $value) {
            $templateId[] = $value['emp_id'];
        }
        $parameterData = $this->getRequest()->getParams('emp_id');
        $selectedAppsid = $this->getRequest()->getParams('emp_id');
        if (array_key_exists("selected", $parameterData)) {
            $selectedAppsid = $parameterData['selected'];
        }
        if (array_key_exists("excluded", $parameterData)) {
            if ($parameterData['excluded'] == 'false') {
                $selectedAppsid = $templateId;
            } else {
                $selectedAppsid = array_diff($templateId, $parameterData['excluded']);
            }
        }
        $collection = $this->_collectionFactory->create();
        $collection->addFieldToFilter('emp_id', ['in' => $selectedAppsid]);
        $delete = 0;
        $model = [];
        foreach ($collection as $item) {
            $this->deleteById($item->getEmpId());
            $delete++;
        }
        $this->messageManager->addSuccess(__('A total of %1 Records have been deleted.', $delete));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * [deleteById description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteById($id)
    {
        $item = $this->_employModel->load($id);
        $item->delete();
        return;
    }
}