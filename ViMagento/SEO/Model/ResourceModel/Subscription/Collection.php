<?php
namespace ViMagento\SEO\Model\ResourceModel\Subscription;
/**
 * Subscription Collection
 */
class Collection extends
    \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct() {
        $this->_init('ViMagento\SEO\Model\Subscription',
            'ViMagento\SEO\Model\ResourceModel\Subscription');
    }
}
