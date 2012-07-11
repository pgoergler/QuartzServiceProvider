<?php

namespace Ongoo\Quartz;

use Silex\Application;

/**
 * Description of QuartzServiceProvider
 *
 * @author paul
 */
class QuartzServiceProvider extends \Silex\Provider\SessionServiceProvider
{

    public function boot(Application $app)
    {
        $app['quartz']->init($app['quartz.databases']); // to init database
    }

    public function register(Application $app)
    {
        parent::register($app);

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
