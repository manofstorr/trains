<?php

// Home page
$app->get('/', "trains\Controller\HomeController::indexAction")
    ->bind('home');

// Locomotives
// ===========

// Collection page
$app->get('/locomotives', "trains\Controller\LocomotiveController::collectionAction")
    ->bind('locomotives');

// Cars
// ===========

// Collection page
$app->get('/cars', "trains\Controller\CarController::collectionAction")
    ->bind('cars');

// Car Types page
$app->get('/car/types', "trains\Controller\CarController::typeCollectionAction")
    ->bind('cartypes');

// Car By Types page
$app->get('/cars/by/type/{id}', "trains\Controller\CarController::byTypeCollectionAction")
    ->bind('cars_by_type');
