<?php
/**
 * to provied option for category by change array to option in form
 */
namespace Mangoit\Supplier\Model\Config\Source;

class YesNO implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Form Align
     *  
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '1', 'label' => __('Yes')],
            ['value' => '0', 'label' => __('No')],
        ];
    }
}