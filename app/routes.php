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