<?php

// Home page
$app->get('/', "trains\Controller\homeController::indexAction")
    ->bind('home');

// Locomotives
// ===========

// Collection page
$app->get('/locomotives', "trains\Controller\locomotiveController::collectionAction")
    ->bind('locomotives');