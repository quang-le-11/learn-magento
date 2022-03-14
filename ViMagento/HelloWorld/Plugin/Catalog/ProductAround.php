<?php

namespace ViMagento\HelloWorld\Plugin\Catalog;

use \ViMagento\HelloWorld\Block\Newproduct;

use Magento\Catalog\Model\Product;

class ProductAround
{
    public function aroundGetName($interceptedInput)
    {
        return "Name of product";
    }

}
