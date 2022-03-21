<?php

namespace ViMagento\HelloWorld\Controller\Adminhtml\Post;

use ViMagento\HelloWorld\Model\PostFactory;
use Magento\Backend\App\Action;

class Save extends Action
{
    private $postFactory;

    public function __construct(
        Action\Context $context,
        PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
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
        }
        try {
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage(__('You saved the post.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setPath('helloworld/post/index');
    }
}
