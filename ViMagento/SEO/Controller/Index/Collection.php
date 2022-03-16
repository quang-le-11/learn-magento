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
            ->addAttributeToFilter(
                'entity_id',
                array('in' => array(159, 160, 161, 162))
            );
//            ->setPageSize(10,1);
//            ->addAttributeToSelect(['name', 'price', 'image'])
//            ->addAttributeToFilter('name', array(
//                    'like' => '%Sport%'
//                )
//             );



        $output = '';

//        $productCollection->getDataToAll('price', 20);
        $productCollection->setDataToAll('price', 20);
        foreach ($productCollection as $product) {
            var_dump($product->debug());
        }

        $output = $productCollection->getSelect()->__toString();

        $this->getResponse()->setBody($output);
    }
}
