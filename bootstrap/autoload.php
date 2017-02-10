<?php

require __DIR__.'/Psr4AutoloaderClass.php';

$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('app', __DIR__.'/../app');

return $loader;
