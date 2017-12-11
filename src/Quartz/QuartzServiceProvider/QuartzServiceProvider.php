<?php

namespace Quartz\QuartzServiceProvider;

use Pimple\Container;

/**
 * Description of QuartzServiceProvider
 *
 * @author paul
 */
class QuartzServiceProvider implements \Pimple\ServiceProviderInterface
{

    public function boot(Container $app)
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
