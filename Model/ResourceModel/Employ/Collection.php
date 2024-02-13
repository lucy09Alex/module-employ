<?php
namespace Mangoit\Employ\Model\ResourceModel\Employ;

/**
 * Class Collection
 * @package Mangoit\Employ\Model\ResourceModel\Employ
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Primary Key field name
     *
     * @var string
     */
    protected $_idFieldName = 'employ_id';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'mangoit_employ_employ_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'employ_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mangoit\Employ\Model\Employ', 'Mangoit\Employ\Model\ResourceModel\Employ');
    }
}
