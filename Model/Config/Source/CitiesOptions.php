<?php
/**
 * to provied option for category by change array to option in form
 */
namespace Lucy09Alex\Employ\Model\Config\Source;

use Lucy09Alex\Employ\Helper\Data;
use Magento\Framework\Option\ArrayInterface;

class CitiesOptions implements ArrayInterface
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
        // $allCities = $this->_helper->getMpCities();
        // $options = [];

        // foreach ($allCities as $index=>$value) {
        //     $options[] = [
        //         'value' => $index,
        //         'label' => $value,
        //     ];
        // }
        // return $options;
        return [
            ['value' => '', 'label' => __('-Select-')],
            ['value' => '0', 'label' => __('City 1')],
            ['value' => '1', 'label' => __('City 2')],
            // Add more state options as needed
        ];
    }
}