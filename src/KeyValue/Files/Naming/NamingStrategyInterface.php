<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files\Naming;

interface NamingStrategyInterface
{
    /*
     * Return full path to file by key.
     */
    public function path(string $key): string;

}