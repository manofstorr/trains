<?php

// Register services
$app['dao.locomotive'] = function ($app) {
return new trains\Model\Locomotive\LocomotiveModel($app['db']);
};

$app['dao.locomotiveType'] = function ($app) {
    return new trains\Model\Locomotive\LocomotiveTypeModel($app['db']);
};