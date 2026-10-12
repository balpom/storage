<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Files;

use Balpom\Storage\AbstractDriver;
use Balpom\Storage\KeyValue\Files\Naming\NamingStrategyInterface;
use Balpom\Storage\KeyValue\Files\Naming\DefaultNaming;

abstract class AbstractFilesDriver extends AbstractDriver
{
    protected string $rootDirectory;
    protected NamingStrategyInterface|null $naming;

    public function __construct(string $rootDirectory, NamingStrategyInterface|null $naming = null)
    {
        $this->rootDirectory = $rootDirectory;
        $this->naming = $naming ?: new DefaultNaming($rootDirectory);
    }

    public function isValidValue(mixed $value): bool
    {
        $validTypes = ['string', 'int', 'float'];
        return in_array(gettype($value), $validTypes);
    }

}