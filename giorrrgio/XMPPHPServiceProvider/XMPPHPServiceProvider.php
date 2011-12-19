<?php

namespace giorrrgio\XMPPHPServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class XMPPHPServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        /* @TODO: Use proper autoloading when/if XMPPHP fixes compliance.*/

        $app['xmpphp'] = $app->share(function () use ($app) {
            require_once $app['xmpphp.class_file'];
            $app['xmpphp.class'] = isset($app['xmpphp.class']) ?: 'XMPPHP_XMPP';
            $app['xmpphp.server'] = isset($app['xmpphp.server']) ?: null;
            $app['xmpphp.printlog'] = isset($app['xmpphp.printlog']) ?: false;
            $app['xmpphp.loglevel'] = isset($app['xmpphp.loglevel']) ?: null;
            return new $app['xmpphp.class'](
                $app['xmpphp.host'], 
                $app['xmpphp.port'], 
                $app['xmpphp.user'], 
                $app['xmpphp.password'], 
                $app['xmpphp.resource'], 
                $app['xmpphp.server'], 
                $app['xmpphp.printlog'], 
                $app['xmpphp.loglevel']
            );
        });
    }
}

