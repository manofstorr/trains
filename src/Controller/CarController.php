<?php

namespace trains\Controller;

use Silex\Application;
use trains\Model\Car\CarsIterator;

class CarController
{

    public function typeCollectionAction(Application $app)
    {
        // CarsType list
        $carTypes = $app['model.carType']->findAll();
        $carsCountByType = $app['model.car']->carsCountByType();

        return $app['twig']->render('car/carTypesView.html.twig',
            ['carTypes' => $carTypes, 'carsCountByType' => $carsCountByType]
        );
    }

    /**
     * A simple collection based on the model
     *
     * @param Application $app
     * @return mixed
     */
    public function collectionAction(Application $app)
    {
        $cars = $app['model.car']->findAll();
        return $app['twig']->render('car/carCollection.html.twig', ['cars' => $cars]);
    }

    /**
     * An elaborated collection based on filtered data and iterator
     *
     * @param Application $app
     * @return mixed
     */
    public function byTypeCollectionAction ($id, Application $app)
    {
        // data
        $allCars = $app['model.car']->findAll();
        $carsFiltered = [];

        // iterator ...
        $carIterator = new CarsIterator();
        $carIterator->fill($allCars);

        while ($carIterator->valid()) {
            $car = $carIterator->current();
            if ($car->getType()->getId() === $id) {
                array_push($carsFiltered, $car);
            }
            $carIterator->next();
        }

        // type name
        $type = $app['model.carType']->findById($id);

        return $app['twig']->render('car/carCollection.html.twig', ['cars' => $carsFiltered, 'type' => $type]);

    }

}