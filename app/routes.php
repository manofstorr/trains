<?php

// Home page
/*
$app->get('/', function () use ($app) {
    $locomotives = $app['dao.locomotive']->findAll();

    ob_start();             // start buffering HTML output
    require '../src/views/homeView.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});
*/

$app->get('/', function () use ($app) {
    $locomotives = $app['dao.locomotive']->findAll();
    return $app['twig']->render('home.html.twig', array('locomotives' => $locomotives));

});