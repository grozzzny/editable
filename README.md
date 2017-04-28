Editable for EasyiiCMS 
==============================

This module allows to [Easy yii2 cms](http://github.com/noumo/easyii) 

## Installation guide

Please, install [User module for EasyiiCMS by following these instructions](https://github.com/grozzzny/editable) before going further

```bash
$ php composer.phar require grozzzny/editable "dev-master"
```


Run migrations
```bash
php yii migrate --migrationPath=@vendor/grozzzny/editable/migrations
```

### HTML. Paste footer or header
```php
<!-- Модуль: вставка кода -->
<? foreach (Editable::findAll(['status' => Editable::STATUS_ON]) as $editable) echo $editable->code.PHP_EOL; ?>
```
