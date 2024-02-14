<?php
/**
 * Copyright © Lucy09Alex Technologies Pvt Ltd. All rights reserved.
 * Delete Existing specific row data of Employ 
 */
namespace Lucy09Alex\Employ\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Delete extends Action
{

    /**
     * @var Employ
     */
    protected $_modelEmp;

    
    /**
     * @param Action\Context $context
     * @param \Lucy09Alex\Employ\Model\Employ $model
     */
    public function __construct(
        Action\Context $context,
        \Lucy09Alex\Employ\Model\Employ $model
    ) {
        parent::__construct($context);
        $this->_modelEmp = $model;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Lucy09Alex_Employ::delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('emp_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_modelEmp;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['emp_id' => $id]);
            }
        }
        $this->messageManager->addError(__('Record does not exist'));
        return $resultRedirect->setPath('*/*/');
    }
}
