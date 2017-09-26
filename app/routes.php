<?php

// Home page
$app->get('/', function () use ($app) {
    return $app['twig']->render('home/home.html.twig');

});

// Home page
$app->get('/locomotives', function () use ($app) {
    $locomotives = $app['dao.locomotive']->findAll();
    return $app['twig']->render('locomotive/locomotiveCollection.html.twig', array('locomotives' => $locomotives));

});