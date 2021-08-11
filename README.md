# Prodovo - Module Admin Reindex

    ``prodovo/module-admin-reindex``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [FAQ](#markdown-header-faq)


## Main Functionality
This module reintroduces the ability to reindex your store in the admin panel.

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Prodovo/AdminReindex`
 - Enable the module by running `php bin/magento module:enable Prodovo_AdminReindex`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require prodovo/module-admin-reindex`
 - enable the module by running `php bin/magento module:enable Prodovo_AdminReindex`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## FAQ

If you have any issues while using any of our modules please feel free to get in touch and we will be happy to help resolve them for you. 

http://www.prodovo.co.uk

