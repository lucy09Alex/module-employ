<?php
/**
 * Copyright © Lucy09Alex Technologies Pvt Ltd. All rights reserved.
 *  Save grid's data for new row for Employ
 */
namespace Lucy09Alex\Employ\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Lucy09Alex\Employ\Model\Employ;
use Magento\Backend\Model\Session;
use Magento\Framework\Serialize\Serializer\Json;

class Save extends \Magento\Backend\App\Action
{


    /**
     * @var Employ
     */
    protected $_customModel;


    /**
     * @var Session
     */
    protected $_adminSession;

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    protected $_json;

    /**
     * to save data in database
     * @param $context
     * @param $Custommodel
     * @param $adminsession
     * @param $json
     */
    public function __construct(
        Action\Context $context,
        Employ $Custommodel,
        Session $adminsession,
        Json $json
    ) {
        parent::__construct($context);
        $this->_customModel = $Custommodel;
        $this->_adminSession = $adminsession;
        $this->_json = $json;
    }


    /**
     * to Save new row of data
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($data) {
            $employ_id = $this->getRequest()->getParam('emp_id');

            if ($employ_id) {
                $this->_customModel->load($employ_id);
            }

            $this->_customModel->setData($data);

            try {
                $this->_customModel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->_adminSession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath(
                            '*/*/',
                            [
                                'id' => $this->_customModel->getId(),
                                '_current' => true
                            ]
                        );
                    }
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/', ['emp_id' => $this->getRequest()->getParam('emp_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}