<?php
namespace ViMagento\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\HttpConnectActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \ViMagento\HelloWorld\Model\PostFactory $postFactory)
    {
        $this->postFactory = $postFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {

        $data = $this->postFactory->create()->getCollection();
        foreach ($data as $value) {
            echo "<pre>";
            print_r($value->getData());
            echo "</pre>";
        }
 //       return $this->_redirect('hello/index/index1');
//      return $this->_forward('Index1', 'Index', 'hello' );
    }

}

