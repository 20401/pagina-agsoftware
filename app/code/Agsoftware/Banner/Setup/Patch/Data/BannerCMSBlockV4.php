<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Agsoftware\Banner\Setup\Patch\Data;

use Magento\Cms\Api\BlockRepositoryInterface;
// use Magento\Cms\Api\Data\BlockInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

/**
 */
class BannerCMSBlockV4
    implements DataPatchInterface,
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
<style>#html-body [data-pb-style=NQXW02A]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=QSV5X4M]{min-height:300px}#html-body [data-pb-style=O80H214]{display:inline-block}#html-body [data-pb-style=WOISDFE]{text-align:center}#html-body [data-pb-style=TFI9N2K]{display:inline-block}#html-body [data-pb-style=AB5UC8U]{text-align:center}#html-body [data-pb-style=B2D1YJJ]{min-height:330px}#html-body [data-pb-style=F8UE4XH]{background-position:left top;background-size:cover;background-repeat:no-repeat;min-height:330px}#html-body [data-pb-style=C6A0BV5]{background-color:transparent}#html-body [data-pb-style=NGJ7SQ7]{min-height:330px}#html-body [data-pb-style=S6LAB95]{background-position:left top;background-size:cover;background-repeat:no-repeat;min-height:330px}#html-body [data-pb-style=QFVOMOI]{background-color:transparent}#html-body [data-pb-style=VREWMU7]{min-height:330px}#html-body [data-pb-style=UGCLCR0]{background-position:left top;background-size:cover;background-repeat:no-repeat;min-height:330px}#html-body [data-pb-style=WKRP9EE]{background-color:transparent}</style>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_banner" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="NQXW02A">
<div class="pagebuilder-slider" data-content-type="slider" data-appearance="default" data-autoplay="true" data-autoplay-speed="5000" data-fade="true" data-infinite-loop="true" data-show-arrows="true" data-show-dots="true" data-element="main" data-pb-style="QSV5X4M">
<div data-content-type="slide" data-slide-name="" data-appearance="collage-left" data-show-button="never" data-show-overlay="never" data-element="main" data-pb-style="B2D1YJJ">
<div data-element="empty_link">
<div class="pagebuilder-slide-wrapper" data-background-images="{\"desktop_image\":\"{{media url=wysiwyg/pine-cone-gf86e4f3fb_1920.jpg}}\"}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="F8UE4XH">
<div class="pagebuilder-overlay" data-overlay-color="#0000fe" data-element="overlay" data-pb-style="C6A0BV5">
<div class="pagebuilder-collage-content">
<div data-element="content">
<h2><span style="vertical-align: inherit;">Crea un impacto en el desarollo de tu negocio&nbsp;</span></h2>
<p><span style="vertical-align: inherit;">Nosotros te ayudamos en la creación de tu E-commerce En Magento la plataforma más potente del mundo</span></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div data-content-type="slide" data-slide-name="" data-appearance="collage-left" data-show-button="never" data-show-overlay="never" data-element="main" data-pb-style="NGJ7SQ7">
<div data-element="empty_link">
<div class="pagebuilder-slide-wrapper" data-background-images="{\"desktop_image\":\"{{media url=wysiwyg/nature-gbc04cee73_1920.jpg}}\"}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="S6LAB95">
<div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay" data-pb-style="QFVOMOI">
<div class="pagebuilder-collage-content">
<div data-element="content">
<h2><span style="vertical-align: inherit;">Crea un impacto en el desarollo de tu negocio&nbsp;</span></h2>
<p><span style="vertical-align: inherit;">Nosotros te ayudamos en la creación de tu E-commerce En Magento la plataforma más potente del mundo</span></p>
</div>
</div>
</div>
</div>
</div>
</div>
<div data-content-type="slide" data-slide-name="" data-appearance="collage-left" data-show-button="never" data-show-overlay="never" data-element="main" data-pb-style="VREWMU7">
<div data-element="empty_link">
<div class="pagebuilder-slide-wrapper" data-background-images="{\"desktop_image\":\"{{media url=wysiwyg/medicinal-herb-g7411d0659_1920.jpg}}\"}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="UGCLCR0">
<div class="pagebuilder-overlay" data-overlay-color="" data-element="overlay" data-pb-style="WKRP9EE">
<div class="pagebuilder-collage-content">
<div data-element="content">
<h2><span style="vertical-align: inherit;">Crea un impacto en el desarollo de tu negocio&nbsp;</span></h2>
<p><span style="vertical-align: inherit;">Nosotros te ayudamos en la creación de tu E-commerce En Magento la plataforma más potente del mundo</span></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container_buttom" data-content-type="buttons" data-appearance="inline" data-same-width="false" data-element="main">
<div data-content-type="button-item" data-appearance="default" data-element="main" data-pb-style="O80H214">
<div class="pagebuilder-button-primary" data-element="empty_link" data-pb-style="WOISDFE"><span data-element="link_text">Empezar</span></div>
</div>
<div data-content-type="button-item" data-appearance="default" data-element="main" data-pb-style="TFI9N2K">
<div class="pagebuilder-button-secondary" data-element="empty_link" data-pb-style="AB5UC8U"><span data-element="link_text">Aprender Mas</span></div>
</div>
</div>
</div>
</div>
HTML;
        $blockData = [
            'title' => 'Baner',
            'identifier' => 'princpal',
            'stores' => [0],
            'is_active' => 1,
            'content'=> $blockHtmlContent,
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
