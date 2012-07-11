<?php

namespace Quartz\QuartzServiceProvider;

use Silex\Application;

/**
 * Description of QuartzServiceProvider
 *
 * @author paul
 */
class QuartzServiceProvider implements \Silex\ServiceProviderInterface
{

    public function boot(Application $app)
    {
        $app['quartz']->init($app['quartz.databases']); // to init database
    }

    public function register(Application $app)
    {
        $app['quartz.databases'] = array();
        
        $app['quartz'] = $app->share(function() use (&$app)
                {
                    return \Quartz\Quartz::getInstance();
                });
        $app['orm'] = $app->share(function() use (&$app)
                {
                    return \Quartz\Quartz::getInstance();
                });        
                
    }

}

?>
