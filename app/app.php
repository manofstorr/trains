<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Silex\Provider;
use Symfony\Component\EventDispatcher\EventDispatcher;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/Views',
));
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));

// stuff for the debugbar
$app->register(new Silex\Provider\HttpFragmentServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Provider\WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
    'profiler.mount_prefix' => '/_profiler', // this is the default
));

//$listener = new Trains\EventListener\TrainsListener();
//$app['dispatcher']->addListener('carcreate', array($listener, 'onCarCreate'));

$app['dispatcher']->addListener('carcreate', function (Symfony\Component\EventDispatcher\Event $event) {
    $listener = new Trains\EventListener\TrainsListener();
    $listener->onCarCreate($event);
});

require 'services.php';
