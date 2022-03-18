<?php

namespace ViMagento\HelloWorld\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddProductAttribute implements DataPatchInterface
{
    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddProductAttribute constructor.
     *
     * @param ModuleDataSetupInterface  $moduleDataSetup
     * @param EavSetupFactory           $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    /**
     * Apply là hàm chính, mọi sửa đổi bạn muốn sẽ được viết ở đây
     * */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute('catalog_product', 'helloworld', [
            'type' => 'int',
            'label' => 'HelloWorld ViMagento',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'default' => 0,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'visible' => true,
            'used_in_product_listing' => true,
            'user_defined' => true,
            'required' => false,
            'group' => 'General',
            'sort_order' => 80,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    /**
     * getDependencies() định nghĩa những phụ thuộc của patch
    */
    public static function getDependencies()
    {
//        return [
//            \SomeVendor\SomeModule\Setup\Patch\Data\SomePatch::class
//        ];
        return [];
    }

    /**
     * {@inheritdoc}
     */
    //getAliases() tên định danh cho patch
    public function getAliases()
    {
        return [];
    }
}
