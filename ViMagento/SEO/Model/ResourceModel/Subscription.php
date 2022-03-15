<?php

namespace ViMagento\SEO\Model\ResourceModel;

class Subscription extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('vimagento_seo_subscription', 'subscription_id');
    }
}
