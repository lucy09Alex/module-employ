<?php
/**
 * to provied option for category by change array to option in form
 */
namespace Mangoit\Employ\Model\Config\Source;

use Mangoit\Employ\Helper\Data;
use Magento\Framework\Option\ArrayInterface;

class Position implements ArrayInterface
{
    /**
     * @var helper/data
     */
    protected $_helper;

    /**
     * @param mixed array $name
     */
    public function __construct(Data $data)
    {
        $this->_helper = $data;
    }

    /**
     * Form Align
     *  
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('-Select-')],
            ['value' => '0', 'label' => __('Associative Developer')],
            ['value' => '1', 'label' => __('Senior Developer')],
            ['value' => '2', 'label' => __('Team Leader')],
            ['value' => '3', 'label' => __('Team Project Leader')],
            ['value' => '4', 'label' => __('Admin')],
            ['value' => '5', 'label' => __('Bussiness Manager')],
            ['value' => '6', 'label' => __('HR')],
            ['value' => '7', 'label' => __('Executer')],
            ['value' => '8', 'label' => __('Accountant')],
            // Add more state options as needed
        ];

    }
}