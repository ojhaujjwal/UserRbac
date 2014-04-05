<?php

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    $loader = include __DIR__ . '/../vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/../../../autoload.php')) {
    $loader = include __DIR__ . '/../../../autoload.php';
} elseif (file_exists(__DIR__ . '/../../../vendor/autoload.php')) {
    $loader = include __DIR__ . '/../../../vendor/autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

$loader->addPsr4('UserRbac', __DIR__ . '/../src');
$loader->add('UserRbacTest', __DIR__);
