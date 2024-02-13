<?php
namespace Mangoit\Employ\Model\ResourceModel;

/**
 * Class Employ
 * @package Mangoit\Employ\Model\ResourceModel
 */
class Employ extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Employ constructor.
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Initialize the resource model.
     */
    protected function _construct()
    {
        $this->_init('mangoit_emp', 'emp_id');
    }
}
