<?php

namespace ViMagento\SEO\Controller\Index;

class Subscription extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $subscription = $this->_objectManager->create('ViMagento\SEO\Model\Subscription');
        //      $subscription = $objectManager->create(ViMagento\SEO\Model\Subscription::class);
        $subscription->setFirstname('John');
        $subscription->setLastname('Doe');
        $subscription->setEmail('john.doe@example.com');
        $subscription->setMessage('A short message to test');
        $subscription->save();
        $this->getResponse()->setBody('success');
    }
}
