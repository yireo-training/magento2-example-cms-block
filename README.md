# TestCmsBlock module for Magento 2
This module allows you to configure a CMS block in the backend and then display it in the footer in the frontend.

## Installation
To install use the following composer command:

    composer require yireo/test-cms-block

Next enable the module:

    bin/magento module:enable Yireo_TestCmsBlock
    bin/magento setup:upgrade
    
And flush the cache:

    bin/magento cache:clean

# Proof of concept
After installing the module, the footer should be displaying a message that the module needs to be configured. After the module is configured, the choose CMS block should be outputted.