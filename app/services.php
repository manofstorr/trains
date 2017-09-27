<?php

// Register services

// Locomotives

$app['dao.locomotiveType'] = function ($app) {
    return new trains\Model\Locomotive\LocomotiveTypeModel($app['db']);
};

$app['dao.locomotive'] = function ($app) {
    return new trains\Model\Locomotive\LocomotiveModel($app['db']);
};

// Cars

$app['dao.car'] = function ($app) {
    return new trains\Model\Car\CarModel($app['db']);
};