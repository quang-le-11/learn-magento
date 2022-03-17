<?php

namespace ViMagento\HelloWorld\Model\Config;

class Status implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('Pending')],
            ['value' => 2, 'label' => __('Published')]
        ];
    }
}
