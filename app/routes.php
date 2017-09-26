<?php

// Home page
$app
    ->get('/', function () use ($app) {
        return $app['twig']->render('home/home.html.twig');
    })
    ->bind('home');

// Locomotives Collection page
$app
    ->get('/locomotives', function () use ($app) {
        $locomotives = $app['dao.locomotive']->findAll();
        return $app['twig']->render('locomotive/locomotiveCollection.html.twig', ['locomotives' => $locomotives]);
    })
    ->bind('locomotives');