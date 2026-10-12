<?php

namespace Balpom\Storage;

ini_set('max_execution_time', '15');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('html_errors', 'off');
error_reporting(E_ALL);

include dirname(__DIR__) . '/vendor/autoload.php';

use Balpom\Storage\KeyValue\Files\LocalFilesDriver;
use Balpom\Storage\KeyValue\Files\Naming\DefaultNaming;

$rootDirectory = __DIR__ . '/test_data';
$naming = new DefaultNaming($rootDirectory);
$driver = new LocalFilesDriver($rootDirectory, $naming);
$storage = new DatedKeyValueStorage($driver);

$storage->store('test_field', 'Test value.');
echo $storage->time('test_field') . PHP_EOL;
$storage->time('test_field', 7777777777);
echo $storage->time('test_field') . PHP_EOL;

try {
    $storage->time('test_field', -3333333333);
} catch (\Exception $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
echo $storage->time('test_field') . PHP_EOL;

try {
    $storage->time('test_field', 80000000000);
} catch (\Exception $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
echo $storage->time('test_field') . PHP_EOL;

$storage->time('test_field', -555);
echo $storage->time('test_field') . PHP_EOL;

//$storage->delete('test_field');
