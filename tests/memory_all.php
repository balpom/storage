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

for ($i = 1; $i <= 9; $i++) {
    $storage->store('test_field' . $i, 'Test value: ' . $i);
    $storage->store('test/field' . $i, 'Another test value: ' . $i);
}

$records = $storage->all();
print_r($records);

$storage->clear();

$records = $storage->all();
print_r($records);
