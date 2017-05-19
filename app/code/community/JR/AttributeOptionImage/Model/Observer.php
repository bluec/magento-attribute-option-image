<?php

class JR_AttributeOptionImage_Model_Observer
{
    public function updateLayout()
    {
        $layout = Mage::getSingleton('core/layout');
        $layout->getBlock('head')
            ->setCanLoadExtJs(true)
            ->addJs('mage/adminhtml/variables.js')
            ->addJs('mage/adminhtml/wysiwyg/widget.js')
            ->addItem('js_css', 'prototype/windows/themes/default.css')
        ;
        // Patch SUPEE-8788
        if (file_exists(Mage::getBaseDir('base').DS.'js'.DS.'lib'.DS.'uploader'.DS.'flow.min.js'))
        {
            $layout->getBlock('head')
                ->addJs('lib/uploader/flow.min.js')
                ->addJs('lib/uploader/fusty-flow.js')
                ->addJs('lib/uploader/fusty-flow-factory.js')
                ->addJs('mage/adminhtml/uploader/instance.js')
            ->addItem('skin_css', 'lib/prototype/windows/themes/magento.css')
            ;
        } else {
            // No Patch SUPEE-8788
            $layout->getBlock('head')
                ->addJs('lib/flex.js')
                ->addJs('lib/FABridge.js')
                ->addJs('mage/adminhtml/flexuploader.js')
                ->addItem('js_css', 'prototype/windows/themes/magento.css')
            ;
        }
        $layout->getBlock('head')
            ->addJs('mage/adminhtml/browser.js')
            ->addJs('prototype/window.js')
        ;
    }

    public function addAttributeOptionImageFlagProperty($oObserver) {
        $oFieldset = $oObserver->getForm()->getElement('base_fieldset');
        $oFieldset->addField('enable_option_image', 'select', array(
            'name' => 'enable_option_image',
            'label' => Mage::helper('catalog')->__('Has Option Image'),
            'values' => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
        ), '-');
    }

}
