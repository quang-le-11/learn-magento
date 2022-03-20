<?php

namespace ViMagento\HelloWorld\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
       $resultFactory = $this->resultPageFactory->create();
       return $resultFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ViMagento_HelloWorld::index');
    }
}
