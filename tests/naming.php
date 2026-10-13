<?php

namespace Balpom\Storage\KeyValue\Files\Naming;

ini_set('max_execution_time', '15');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('html_errors', 'off');
error_reporting(E_ALL);

include dirname(__DIR__) . '/vendor/autoload.php';

$naming = new DefaultNaming(__DIR__);

$path = $naming->pathByKey('test_field');
echo $path . PHP_EOL;

$key = $naming->keyByPath($path);
echo $key . PHP_EOL;
