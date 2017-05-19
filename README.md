# Add images/icons to attribute options of your Magento products

## Notice

This is a fork from [aligent](https://github.com/aligent/magento-attribute-option-image) which seems to have been abandoned. I have merged some pull requests and it now works with Magento 1.9.3.2 and is compatible with SUPEE-8788.

![Attribute Option Image](http://i.imgur.com/VB2W5.jpg)

## Features

* Associate image/icon to attribute options
* Specify relative/external url or pick an image from Magento Media Gallery

## Installation

### Magento CE 1.5.x, 1.6.x, 1.7.x, 1.8.x, 1.9.x

Download package manually:

* Download latest version [here](https://github.com/bluec/magento-attribute-option-image/downloads)
* Unzip in Magento root folder
* Clean cache

## Usage

1. Go to *Catalog > Attributes > Manage Attributes*, choose an attribute with options and associate an image/icon to each option
2. In frontend templates, retrieve image src like this `Mage::helper('attributeoptionimage')->getAttributeOptionImage($optionId);` where `$optionId` could be something like `$product->getColor()`
