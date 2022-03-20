<?php
namespace ViMagento\HelloWorld\Controller\Adminhtml\Subscription;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ViMagento_HelloWorld::subscription');
        $resultPage->addBreadcrumb(__('HelloWorld'), __('HelloWorld'));
        $resultPage->addBreadcrumb(__('ManageSubscriptions'), __('Manage Subscriptions'));
        $resultPage->getConfig()->getTitle()->prepend(__('Subscriptions'));
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ViMagento_HelloWorld::subscription');
    }
}
