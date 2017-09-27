<?php

namespace trains\Controller;

use Silex\Application;

class locomotiveController
{

    public function collectionAction(Application $app)
    {
        $locomotives = $app['dao.locomotive']->findAll();
        return $app['twig']->render('locomotive/locomotiveCollection.html.twig', ['locomotives' => $locomotives]);
    }

}