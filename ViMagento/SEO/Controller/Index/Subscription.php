<?php

namespace ViMagento\SEO\Controller\Index;

use Magento\Framework\App\Action\Context;
use ViMagento\SEO\Model\Subscription as SubscriptionCopy;
class Subscription extends \Magento\Framework\App\Action\Action
{
    protected $subscription;

    public function __construct(
        Context $context,
        SubscriptionCopy $subscription
    ) {
        parent::__construct($context);
        $this->subscription = $subscription;
    }

    public function execute()
    {
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $subscription = $this->subscription;
        //      $subscription = $objectManager->create(ViMagento\SEO\Model\Subscription::class);
        $subscription->setFirstname('John');
        $subscription->setLastname('Doe');
        $subscription->setEmail('john.doe@example.com');
        $subscription->setMessage('A short message to test');
        $subscription->save();
        $this->getResponse()->setBody('success');
    }
}
