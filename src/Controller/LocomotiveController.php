<?php

namespace trains\Controller;

use Silex\Application;

class LocomotiveController
{

    public function collectionAction(Application $app)
    {
        $locomotives = $app['dao.locomotive']->findAll();
        return $app['twig']->render('locomotive/carCollection.html.twig', ['locomotives' => $locomotives]);
    }

}