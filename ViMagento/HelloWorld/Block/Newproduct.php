<?php

namespace ViMagento\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Newproduct extends \Magento\Framework\View\Element\Template
{
    private $_productCollectionFactory;
    protected $title;
    public function __construct(Template\Context $context,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                                array $data = [])
    {
        parent::__construct($context, $data);
        $this->_productCollectionFactory = $productCollectionFactory;
    }

    public function getProduct(){
        $collection = $this->_productCollectionFactory->create();
        $collection
            ->addAttributeToSelect('*')
            ->setOrder('created_at')
            ->setPageSize(6);
        return $collection;
    }
}
