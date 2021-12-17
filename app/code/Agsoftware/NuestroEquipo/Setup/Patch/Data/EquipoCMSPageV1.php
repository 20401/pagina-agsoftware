<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Agsoftware\NuestroEquipo\Setup\Patch\Data;


use Magento\Cms\Api\Data\PageInterfaceFactory;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

/**
 */
class EquipoCMSPageV1
    implements DataPatchInterface,
    PatchRevertableInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        PageRepositoryInterface $pageRepository,
        PageInterfaceFactory $pageInterfaceFactory
    ) {
        /**
         * If before, we pass $setup as argument in install/upgrade function, from now we start
         * inject it with DI. If you want to use setup, you can inject it, with the same way as here
         */
        $this->moduleDataSetup = $moduleDataSetup;
        $this->pageRepository = $pageRepository;
        $this->pageInterfaceFactory = $pageInterfaceFactory;
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
        $cmsPage = $this->pageInterfaceFactory->create();

        $blockHtmlContent = <<<HTML
 <style>#html-body [data-pb-style=H5JMF88],#html-body [data-pb-style=OEFHSD2]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=OEFHSD2]{width:100%;align-self:stretch}#html-body [data-pb-style=WJRKBV7]{text-align:center}#html-body [data-pb-style=URD46F3]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=PQAPKAX]{border-style:none}#html-body [data-pb-style=ILUJSN0],#html-body [data-pb-style=NI8KNG8]{max-width:100%;height:auto}#html-body [data-pb-style=L1SSBRE]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=MYTHPSE]{width:5%;border-width:1px;border-color:#fd655e;display:inline-block}#html-body [data-pb-style=E8IE43J]{border-style:none}#html-body [data-pb-style=EWB2LNH],#html-body [data-pb-style=K9J04GA]{max-width:100%;height:auto}#html-body [data-pb-style=P1AQ2N8],#html-body [data-pb-style=WYUTVWQ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=WYUTVWQ]{width:50%;align-self:stretch}#html-body [data-pb-style=WMYF0EX]{border-style:none}#html-body [data-pb-style=NNN91IK],#html-body [data-pb-style=R00XMBY]{max-width:100%;height:auto}#html-body [data-pb-style=UDX1CL5]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=NOKIROR]{width:5%;border-width:1px;border-color:#fd655e;display:inline-block}#html-body [data-pb-style=XOW7WXH]{border-style:none}#html-body [data-pb-style=GHKHQ6L],#html-body [data-pb-style=SCH1J91]{max-width:100%;height:auto}#html-body [data-pb-style=FTY5V1L],#html-body [data-pb-style=JUS42QQ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=JUS42QQ]{width:50%;align-self:stretch}#html-body [data-pb-style=TK8FS1S]{border-style:none}#html-body [data-pb-style=F5QDH0R],#html-body [data-pb-style=GC3BQ5J]{max-width:100%;height:auto}#html-body [data-pb-style=WY9JSQQ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=NU17FSS]{width:5%;border-width:1px;border-color:#fd655e;display:inline-block}#html-body [data-pb-style=IQ4O8L3]{border-style:none}#html-body [data-pb-style=W79DQ82],#html-body [data-pb-style=X3LVQQX]{max-width:100%;height:auto}#html-body [data-pb-style=JGSAR5C],#html-body [data-pb-style=NSXCPO7]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=NSXCPO7]{width:50%;align-self:stretch}#html-body [data-pb-style=PNAEIQR]{border-style:none}#html-body [data-pb-style=A7JDGH1],#html-body [data-pb-style=NFS6CDN]{max-width:100%;height:auto}#html-body [data-pb-style=XI9Q22D]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=YVS9TEO]{width:5%;border-width:1px;border-color:#fd655e;display:inline-block}#html-body [data-pb-style=MC65J4W]{border-style:none}#html-body [data-pb-style=FUA2D2S],#html-body [data-pb-style=FY6MVXO]{max-width:100%;height:auto}#html-body [data-pb-style=NFML6KY],#html-body [data-pb-style=UWTCAYH]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=NFML6KY]{width:50%;align-self:stretch}#html-body [data-pb-style=KGS8Q74]{border-style:none}#html-body [data-pb-style=GTH5WM4],#html-body [data-pb-style=KLYBNKJ]{max-width:100%;height:auto}#html-body [data-pb-style=KP43PVE]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=FDY6092]{width:5%;border-width:1px;border-color:#fd655e;display:inline-block}#html-body [data-pb-style=LCYVFKY]{border-style:none}#html-body [data-pb-style=OTDS38G],#html-body [data-pb-style=WU2FBXB]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=E8IE43J],#html-body [data-pb-style=IQ4O8L3],#html-body [data-pb-style=KGS8Q74],#html-body [data-pb-style=LCYVFKY],#html-body [data-pb-style=MC65J4W],#html-body [data-pb-style=PNAEIQR],#html-body [data-pb-style=PQAPKAX],#html-body [data-pb-style=TK8FS1S],#html-body [data-pb-style=WMYF0EX],#html-body [data-pb-style=XOW7WXH]{border-style:none} }</style>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_nuetro" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="H5JMF88">
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="OEFHSD2">
<h1 class="tittle" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="WJRKBV7">OUR TEAM</h1>
</div>
</div>
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="URD46F3">
<figure class="imagen" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="PQAPKAX"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="desktop_image" data-pb-style="ILUJSN0"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="mobile_image" data-pb-style="NI8KNG8"></figure>
</div>
<div class="pagebuilder-column texts" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="L1SSBRE">
<div class="name_last_name" data-content-type="text" data-appearance="default" data-element="main">
<p>Yordan Viafara</p>
</div>
<div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="MYTHPSE"></div>
<figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="E8IE43J"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="desktop_image" data-pb-style="EWB2LNH"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="mobile_image" data-pb-style="K9J04GA"></figure>
<div data-content-type="text" data-appearance="default" data-element="main">
<p>Describir es explicar, de manera detallada y ordenada, cómo son las personas, animales, lugares, objetos, etc. La descripción sirve sobre todo para ambientar la acción y crear una que haga más creíbles los hechos que se narran</p>
</div>
</div>
</div>
</div>
</div>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_nuetro" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="P1AQ2N8">
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="WYUTVWQ">
<figure class="imagen" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="WMYF0EX"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="desktop_image" data-pb-style="NNN91IK"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="mobile_image" data-pb-style="R00XMBY"></figure>
</div>
<div class="pagebuilder-column texts" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="UDX1CL5">
<div class="name_last_name" data-content-type="text" data-appearance="default" data-element="main">
<p>Andres Ante</p>
</div>
<div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="NOKIROR"></div>
<figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="XOW7WXH"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="desktop_image" data-pb-style="GHKHQ6L"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="mobile_image" data-pb-style="SCH1J91"></figure>
<div data-content-type="text" data-appearance="default" data-element="main">
<p>Describir es explicar, de manera detallada y ordenada, cómo son las personas, animales, lugares, objetos, etc. La descripción sirve sobre todo para ambientar la acción y crear una que haga más creíbles los hechos que se narran</p>
</div>
</div>
</div>
</div>
</div>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_nuetro" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="FTY5V1L">
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="JUS42QQ">
<figure class="imagen" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="TK8FS1S"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="desktop_image" data-pb-style="F5QDH0R"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="mobile_image" data-pb-style="GC3BQ5J"></figure>
</div>
<div class="pagebuilder-column texts" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="WY9JSQQ">
<div class="name_last_name" data-content-type="text" data-appearance="default" data-element="main">
<p>Jhan Carlos Vazque</p>
</div>
<div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="NU17FSS"></div>
<figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="IQ4O8L3"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="desktop_image" data-pb-style="X3LVQQX"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="mobile_image" data-pb-style="W79DQ82"></figure>
<div data-content-type="text" data-appearance="default" data-element="main">
<p>Describir es explicar, de manera detallada y ordenada, cómo son las personas, animales, lugares, objetos, etc. La descripción sirve sobre todo para ambientar la acción y crear una que haga más creíbles los hechos que se narran</p>
</div>
</div>
</div>
</div>
</div>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_nuetro" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="JGSAR5C">
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="NSXCPO7">
<figure class="imagen" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="PNAEIQR"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="desktop_image" data-pb-style="A7JDGH1"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="mobile_image" data-pb-style="NFS6CDN"></figure>
</div>
<div class="pagebuilder-column texts" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="XI9Q22D">
<div class="name_last_name" data-content-type="text" data-appearance="default" data-element="main">
<p>Andres Abonia</p>
</div>
<div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="YVS9TEO"></div>
<figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="MC65J4W"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="desktop_image" data-pb-style="FUA2D2S"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="mobile_image" data-pb-style="FY6MVXO"></figure>
<div data-content-type="text" data-appearance="default" data-element="main">
<p>Describir es explicar, de manera detallada y ordenada, cómo son las personas, animales, lugares, objetos, etc. La descripción sirve sobre todo para ambientar la acción y crear una que haga más creíbles los hechos que se narran</p>
</div>
</div>
</div>
</div>
</div>
<div data-content-type="row" data-appearance="contained" data-element="main">
<div class="container_nuetro" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="UWTCAYH">
<div class="pagebuilder-column-group" style="display: flex;" data-content-type="column-group" data-grid-size="12" data-element="main">
<div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="NFML6KY">
<figure class="imagen" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="KGS8Q74"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="desktop_image" data-pb-style="GTH5WM4"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/persona.png}}" alt="" data-element="mobile_image" data-pb-style="KLYBNKJ"></figure>
</div>
<div class="pagebuilder-column texts" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="KP43PVE">
<div class="name_last_name" data-content-type="text" data-appearance="default" data-element="main">
<p>Edwin Zapata</p>
</div>
<div data-content-type="divider" data-appearance="default" data-element="main"><hr data-element="line" data-pb-style="FDY6092"></div>
<figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="LCYVFKY"><img class="pagebuilder-mobile-hidden" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="desktop_image" data-pb-style="WU2FBXB"><img class="pagebuilder-mobile-only" title="" src="{{media url=wysiwyg/in.png}}" alt="" data-element="mobile_image" data-pb-style="OTDS38G"></figure>
<div data-content-type="text" data-appearance="default" data-element="main">
<p>Describir es explicar, de manera detallada y ordenada, cómo son las personas, animales, lugares, objetos, etc. La descripción sirve sobre todo para ambientar la acción y crear una que haga más creíbles los hechos que se narran</p>
</div>
</div>
</div>
</div>
</div>
HTML;
        $pageData = [
            'title' => 'Nuestro',
            'identifier' => 'equipo',
            'stores' => [0],
            'is_active' => 1,
            'content' => $blockHtmlContent,
            'page_layout' => '1column'
        ];
        $cmsPage->setData($pageData);
        $cmsPage->save();
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
