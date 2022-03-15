<?php

namespace ViMagento\SEO\Controller\Index;

use Zend_Debug;

class Collection extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        // TODO: Implement execute() method.
        //Lấy thông tin sản phảm
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect(['name', 'price', 'image'])
            ->addAttributeToFilter(
                'entity_id',
                array('in' => array(1, 2, 3, 4))
            );

        $output = '';
        foreach ($productCollection as $product) {
            var_dump($product->debug());
        }

        $this->getResponse()->setBody($output);
    }
}
