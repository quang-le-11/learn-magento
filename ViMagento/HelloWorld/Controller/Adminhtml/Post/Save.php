<?php

namespace ViMagento\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use ViMagento\HelloWorld\Model\PostFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $postFactory;

    public function __construct(
        Action\Context $context,
        PostFactory $postFactory,
        RedirectFactory $redirectFactory
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
//        Lấy dữ liệu khi supmit gửi lên
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['post_id']) ? $data['post_id'] : null;

        $newData = [
            'name' => $data['name'],
            'status' => $data['status'],
            'content' => $data['content'],
        ];

        $post = $this->postFactory->create();

        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công.'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }

        try {
            $post->addData($newData);
            $this->_eventManager->dispatch("vimagento_post_before_save", ['postData' => $post]);
            $post->save();
            return $this->resultRedirect->create()->setPath('helloworld/post/index');
            //$this->messageManager->addSuccessMessage(__('You saved the post.'));
        } catch (\Exception $e) {
            //$this->messageManager->addErrorMessage(__($e->getMessage()));
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));

        }

       // return $this->resultRedirectFactory->create()->setPath('helloworld/post/index');
    }
}
