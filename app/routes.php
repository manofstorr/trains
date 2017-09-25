<?php

// Home page
$app->get('/', function () {
    require '../src/model/locomotiveModel.php';
    $locomotives = getLocomotives();

    ob_start();             // start buffering HTML output
    require '../src/view/homeView.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});