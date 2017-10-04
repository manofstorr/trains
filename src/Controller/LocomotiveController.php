<?php

namespace Trains\Controller;

use Silex\Application;

class LocomotiveController
{

    public function collectionAction(Application $app)
    {
        $locomotives = $app['model.Locomotive']->findAll();
        return $app['twig']->render('Locomotive/LocomotiveCollection.html.twig', ['locomotives' => $locomotives]);
    }

}