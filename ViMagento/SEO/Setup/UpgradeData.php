<?php
namespace Packt\SEO\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface {


//    public function __construct
//    (\Magento\Config\Model\ResourceModel\Config
//     $resourceConfig) {
//        $this->resourceConfig = $resourceConfig;
//    }
//    public function upgrade(ModuleDataSetupInterface $setup,
//                            ModuleContextInterface $context) {
//        if (version_compare($context->getVersion(),
//                '2.0.1') < 0) {
//            $this->resourceConfig->saveConfig(
//                'web/cookie/cookie_lifetime',
//                '7200',
//                \Magento\Config\Block\System\Config\Form::SCOPE_DEFAULT,
//                0
//            );
//        }
//    }

    protected $categorySetupFactory;

    public function __construct(\Magento\Catalog\Setup\CategorySetupFactory
     $categorySetupFactory) {
        $this->categorySetupFactory = $categorySetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        if (version_compare($context->getVersion(), '2.0.4') < 0)
        {
            $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
            $entityTypeId = $categorySetup->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);

            $categorySetup->addAttribute($entityTypeId,
                'seo_label',
                array(
                    'type' => 'varchar',
                    'label' => 'SEO label',
                    'input' => 'text',
                    'required' => false,
                    'visible_on_front' => 1,
                    'apply_to' =>
                        'simple,configurable,virtual,bundle,downloadable',
                    'unique' => false,
                    'group' => 'SEO'
                ));
        }
    }
}
