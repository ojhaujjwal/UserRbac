<?php

namespace UserRbac\Test;

use RuntimeException;

chdir(__DIR__);

if (file_exists(__DIR__ . '/../../../../vendor/autoload.php')) {
    $loader = include __DIR__ . '/../../../../vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/../../../vendor/autoload.php')) {
    $loader = include __DIR__ . '/../../../vendor/autoload.php';
} elseif(file_exists(__DIR__ . '/../../autoload.php')) {
    $loader = include __DIR__ . '/../../autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

$loader->add('UserRbac', __DIR__ . '/../src');
$loader->add('UserRbacTest', __DIR__);
