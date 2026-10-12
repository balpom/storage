<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files\Naming;

use Balpom\Storage\KeyValue\StorageException;

abstract class AbstractNaming implements NamingStrategyInterface
{
    protected string $rootDirectory;

    public function __construct(string $rootDirectory)
    {
        if ('' === $rootDirectory) {
            throw new StorageException('Empty root directory!');
        }
        $this->rootDirectory = $this->sanitizeDirectory($rootDirectory);
    }

    abstract protected function sanitizeDirectory(string $dir): string;

}