# Magento 2 Employ Module by Lucy09Alex

## Overview

This is the Employ module for Magento 2 developed by Lucy09Alex.

## Description

The Employ module provides additional features related to employee management in Magento 2.

## Requirements

- PHP <= 7.4.0 >=8.1.0
- Magento/Framework >= 103.0.*
- Magento/Customer >= 103.0.*
- Magento/ImportExport >= 101.0.*

## Installation

### Composer Installation

You can install this module using Composer. Run the following commands in your Magento root directory:

```bash
composer require lucy09alex/module-employ
php bin/magento module:enable Lucy09Alex_Employ
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento s:s:d -f
php bin/magento c:f

