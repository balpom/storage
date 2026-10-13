<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files\Naming;

interface NamingInterface
{
    /*
     * Return full path to file by key.
     */
    public function pathByKey(string $key): string;

    /*
     * Return key by full path to file.
     */
    public function keyByPath(string $path): string;

}