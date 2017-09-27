<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 27/09/2017
 * Time: 15:47
 */

namespace trains\Controller;

use Silex\Application;

class HomeController
{

    public function indexAction(Application $app)
    {
        return $app['twig']->render('home/home.html.twig');
    }

}
