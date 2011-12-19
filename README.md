XMPPHP Service Provider
=======================

A simple Silex Service Provider for integrating XMPPHP into your Silex Project. Note that though XMPPHP is stable, it does not support namespaces yet, thus the Provider uses a require_once to load the XMPP class file.

Usage:

```php
<?php
$app['autoloader']->registerNamespaces(array(
    'giorrrgio\XMPPHPServiceProvider' => __DIR__.'/../vendor'
));

$app['xmpphp.class_file'] = __DIR__.'/../vendor/XMPPHP/XMPP.php';
$app['xmpphp.host'] = 'localhost';
$app['xmpphp.port'] = 5222; 
$app['xmpphp.user'] = 'myuser';
$app['xmpphp.password'] = 'test';
$app['xmpphp.resource'] = 'xmpphp';
$app->register(new \giorrrgio\XMPPHPServiceProvider\XMPPHPServiceProvider());
```

