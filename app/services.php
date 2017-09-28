<?php

// Register services

// Locomotives

$app['model.locomotiveType'] = function ($app) {
    return new trains\Model\Locomotive\LocomotiveTypeModel($app['db']);
};

$app['model.locomotive'] = function ($app) {
    return new trains\Model\Locomotive\LocomotiveModel($app['db']);
};

// Cars

$app['model.carType'] = function ($app) {
    return new trains\Model\Car\CarTypeModel($app['db']);
};

$app['model.car'] = function ($app) {
    return new trains\Model\Car\CarModel($app['db']);
};

