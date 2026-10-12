<?php

declare(strict_types=1);

namespace Balpom\Storage\KeyValue\Memory;

use Balpom\Storage\AbstractDriver;

abstract class AbstractMemoryDriver extends AbstractDriver
{
    public function isValidValue(mixed $value): bool
    {
        $validTypes = ['string', 'int', 'float', 'bool', 'null', 'array', 'object'];
        return in_array(gettype($value), $validTypes);
    }

}