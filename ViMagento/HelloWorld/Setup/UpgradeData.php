<?php
namespace ViMagento\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

//class UpgradeData implements UpgradeDataInterface
//{
//
//    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
//    {
//        $setup->startSetup();
//
////        if (version_compare($context->getVersion(), '1.0.2') < 0) {
////            $tableName = $setup->getTable('vimagento_helloworld_post_categories');
////            //Check for the existence of the table
////            if ($setup->getConnection()->isTableExists($tableName) == true) {
////                $data = [
////                    [
////                        'cat_title' => 'News',
////                        'status' => 1,
////                        'created_at' => date('Y-m-d H:i:s'),
////                    ],
////                    [
////                        'cat_title' => 'Tutorials',
////                        'status' => 0,
////                        'created_at' => date('Y-m-d H:i:s'),
////                    ],
////                    [
////                        'cat_title' => 'Uncategorized',
////                        'status' => 0,
////                        'created_at' => date('Y-m-d H:i:s'),
////                    ]
////                ];
////                foreach ($data as $item) {
////                    //Insert data
////                    $setup->getConnection()->insert($tableName, $item);
////                }
////            }
////        }
//
//        if (version_compare($context->getVersion(), '1.0.3') < 0) {
//            $tableName = $setup->getTable('helloworld_post');
//            //Check for the existence of the table
//            if ($setup->getConnection()->isTableExists($tableName) == true) {
//                $data = [
//                    [
//                        'name' => 'Bai 1',
//                        'status' => 1,
//                        'content' => 'Tao bang bang Upgrude',
//                        'created_at' => date('Y-m-d H:i:s'),
//                    ],
//                    [
//                        'name' => 'Bai 2',
//                        'status' => 1,
//                        'content' => 'Tao bang bang db_schema',
//                        'created_at' => date('Y-m-d H:i:s'),
//                    ],
//                    [
//                        'name' => 'Bai 3',
//                        'status' => 0,
//                        'content' => 'Tao bang bang Upgrude',
//                        'created_at' => date('Y-m-d H:i:s'),
//                    ]
//                ];
//                foreach ($data as $item) {
//                    //Insert data
//                    $setup->getConnection()->insert($tableName, $item);
//                }
//            }
//        }
//        $setup->endSetup();
//    }
//}


class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'use_setup_script',
                [
                    'group' => 'General',
                    'attribute_set_id' => 'Bag',
                    'type' => 'varchar',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Use Setup Script',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => true,
                    'default' => 0,
                    'searchable' => true,
                    'filterable' => true,
                    'comparable' => true,
                    'visible_on_front' => true,
                    'sort_order' => 50,
                    'option' => [
                        'values' => [],
                    ]
                ]
            );
        }
    }
}
