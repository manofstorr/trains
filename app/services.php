<?php

// Register services

// Locomotives

$app['model.locomotiveType'] = function ($app) {
    return new Trains\Model\Locomotive\LocomotiveTypeModel($app['db']);
};

$app['model.Locomotive'] = function ($app) {
    return new Trains\Model\Locomotive\LocomotiveModel($app['db']);
};

// Cars

$app['model.carType'] = function ($app) {
    return new Trains\Model\Car\CarTypeModel($app['db']);
};

$app['model.Car'] = function ($app) {
    return new Trains\Model\Car\CarModel($app['db']);
};

