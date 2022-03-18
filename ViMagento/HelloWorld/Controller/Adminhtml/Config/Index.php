<?php

namespace ViMagento\HelloWorld\Controller\Adminhtml\Config;

use Magento\Backend\App\Action;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Index extends \Magento\Backend\App\Action
{

    const ENABLE = "setting/post/enable";
    const DISPLAY_TEXT = "setting/post/display_text";
    const COLOR = "setting/post/color";
    const LANGUAGE = "setting/post/language";
    const ADMIN_RESOURCE = 'ViMagento_HelloWorld::post';

    protected $scopeConfig;

    public function __construct(
        Action\Context $context,
        ScopeConfigInterface  $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        $enable = $this->scopeConfig->getValue(self::ENABLE, ScopeInterface::SCOPE_STORE);
        $displayText = $this->scopeConfig->getValue(self::DISPLAY_TEXT, ScopeInterface::SCOPE_STORE);
        $color = $this->scopeConfig->getValue(self::COLOR, ScopeInterface::SCOPE_STORE);
        $language = $this->scopeConfig->getValue(self::LANGUAGE, ScopeInterface::SCOPE_STORE);
        echo $enable;
        echo "<br>";
        echo $displayText;
        echo "<br>";
        echo $color;
        echo "<br>";
        echo $language;

    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ViMagento_HelloWorld::index');
    }
}
