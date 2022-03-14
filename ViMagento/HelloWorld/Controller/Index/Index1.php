<?php

namespace ViMagento\HelloWorld\Controller\Index;

class Index1 extends \Magento\Framework\App\Action\Action
{

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
