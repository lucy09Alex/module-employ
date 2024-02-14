<?php
/**
 * to provied option for category by change array to option in form
 */
namespace Lucy09Alex\Employ\Model\Config\Source;

class Gender implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Form Align
     *  
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('-Select-')],
            ['value' => '0', 'label' => __('Other')],
            ['value' => '1', 'label' => __('Male')],
            ['value' => '2', 'label' => __('Female')],
        ];
    }
}