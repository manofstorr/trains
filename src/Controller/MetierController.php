<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 02/10/2017
 * Time: 16:03
 */

namespace Trains\Controller;

use Silex\Application;

class MetierController
{
    public function rollingStockCreateAction(Application $app)
    {
        return $app['twig']->render('Metier/RollingStockCreate.html.twig');
    }
}