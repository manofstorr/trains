<?php

namespace trains\Controller;

use Silex\Application;

class CarController
{

    public function collectionAction(Application $app)
    {
        $cars = $app['dao.car']->findAll();
        return $app['twig']->render('car/carCollection.html.twig', ['cars' => $cars]);
    }

}