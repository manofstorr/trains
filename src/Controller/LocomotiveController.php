<?php

namespace trains\Controller;

use Silex\Application;

class LocomotiveController
{

    public function collectionAction(Application $app)
    {
        $locomotives = $app['model.locomotive']->findAll();
        return $app['twig']->render('locomotive/locomotiveCollection.html.twig', ['locomotives' => $locomotives]);
    }

}