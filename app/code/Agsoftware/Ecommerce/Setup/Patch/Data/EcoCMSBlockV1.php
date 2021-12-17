<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Agsoftware\Ecommerce\Setup\Patch\Data;

use Magento\Cms\Api\BlockRepositoryInterface;
// use Magento\Cms\Api\Data\BlockInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

/**
 */
class EcoCMSBlockV1
implements
    DataPatchInterface,
    PatchRevertableInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $blockFactory;

    /**
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory,
        BlockRepositoryInterface $blockRepository

    ) {
        /**
         * If before, we pass $setup as argument in install/upgrade function, from now we start
         * inject it with DI. If you want to use setup, you can inject it, with the same way as here
         */
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockRepository = $blockRepository;
        $this->blockFactory = $blockFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        //The code that you want apply in the patch
        //Please note, that one patch is responsible only for one setup version
        //So one UpgradeData can consist of few data patches
        $cmsBlock = $this->blockFactory->create();

        $blockHtmlContent = <<<HTML
 <style>#html-body [data-pb-style=BBQ0G48],#html-body [data-pb-style=GTG2HRG],#html-body [data-pb-style=JWUFNAA]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=GTG2HRG],#html-body [data-pb-style=JWUFNAA]{width:50%;align-self:stretch}#html-body [data-pb-style=OR9WQLO]{border-style:none}#html-body [data-pb-style=IUEGXI0],#html-body [data-pb-style=YEW5X42]{max-width:100%;height:auto}#html-body [data-pb-style=O3KL1R3]{display:inline-block}#html-body [data-pb-style=VJTYCOG]{text-align:center}@media only screen and (max-width: 768px) { #html-body [data-pb-style=OR9WQLO]{border-style:none} }</style>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_ecommerce" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="BBQ0G48">
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="JWUFNAA">
<figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="OR9WQLO"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/magento.png}}" alt="" data-element="desktop_image" data-pb-style="IUEGXI0"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/magento.png}}" alt="" data-element="mobile_image" data-pb-style="YEW5X42"></figure>
</div>
<div class="pagebuilder-column pagebuilder_column_two" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="GTG2HRG">
<div data-content-type="text" data-appearance="default" data-element="main">
<p>SOLUCIONES</p>
</div>
<div class="sub_tittle" data-content-type="text" data-appearance="default" data-element="main">
<p>ECOMMERCE</p>
</div>
<div class="texts" data-content-type="text" data-appearance="default" data-element="main">
<p>Como partners oficiales de Magento, construimos cada fase de su proyecto eCommerce. Alcance y funcionalidades a la medida. Integración con sus procesos logiticos, ERP y otros aplicativos. interfaz de su usuario pensada para optimizar su conversión</p>
</div>
<div data-content-type="buttons" data-appearance="inline" data-same-width="false" data-element="main">
<div data-content-type="button-item" data-appearance="default" data-element="main" data-pb-style="O3KL1R3">
<div class="pagebuilder-button-link" data-element="empty_link" data-pb-style="VJTYCOG"><span data-element="link_text">Comenzar tu proyecto eCommerce</span></div>
</div>
</div>
</div>
</div>
</div>
</div>
HTML;
        $blockData = [
            'title' => 'Solucione',
            'identifier' => 'ecommerce',
            'stores' => [0],
            'is_active' => 1,
            'content' => $blockHtmlContent,
        ];
        $cmsBlock->setData($blockData);
        $cmsBlock->save();
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        /**
         * This is dependency to another patch. Dependency should be applied first
         * One patch can have few dependencies
         * Patches do not have versions, so if in old approach with Install/Ugrade data scripts you used
         * versions, right now you need to point from patch with higher version to patch with lower version
         * But please, note, that some of your patches can be independent and can be installed in any sequence
         * So use dependencies only if this important for you
         */
        return [];
    }

    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        //Here should go code that will revert all operations from `apply` method
        //Please note, that some operations, like removing data from column, that is in role of foreign key reference
        //is dangerous, because it can trigger ON DELETE statement
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        /**
         * This internal Magento method, that means that some patches with time can change their names,
         * but changing name should not affect installation process, that's why if we will change name of the patch
         * we will add alias here
         */
        return [];
    }
}
