<?php

namespace Balpom\Storage;

ini_set('max_execution_time', '15');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('html_errors', 'off');
error_reporting(E_ALL);

include dirname(__DIR__) . '/vendor/autoload.php';

use Balpom\Storage\KeyValue\Memory\StatelessMemoryDriver;

$driver = new StatelessMemoryDriver();
$storage = new DatedKeyValueStorage($driver);

$storage->store('test_field', 'Test value.');

echo ($storage->exists('test_field') ? 'TRUE' : 'FALSE') . PHP_EOL;
echo gettype($storage->value('test_field')) . ' --- ' . $storage->value('test_field') . PHP_EOL;

echo $storage->time('test_field') . PHP_EOL;
$storage->time('test_field', 7777777777);
echo $storage->time('test_field') . PHP_EOL;

$storage->delete('test_field');

echo ($storage->exists('test_field') ? 'TRUE' : 'FALSE') . PHP_EOL;
echo gettype($storage->value('test_field')) . PHP_EOL;
