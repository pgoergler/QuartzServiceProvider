<?php

namespace Quartz\QuartzServiceProvider;

use Silex\Application,
    Pimple\Container;

/**
 * Description of QuartzServiceProvider
 *
 * @author paul
 */
class QuartzServiceProvider implements \Silex\Api\BootableProviderInterface, \Pimple\ServiceProviderInterface
{

    public function boot(Application $app)
    {
        $app['orm']->init($app['quartz.databases']); // to init database
    }

    public function register(Container $app)
    {
        $app['quartz.databases'] = array();

        $app['orm'] = function() use (&$app) {
            return \Quartz\Quartz::getInstance();
        };
    }

}
