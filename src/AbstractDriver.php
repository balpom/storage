<?php

declare(strict_types=1);

namespace Balpom\Storage;

use Balpom\Storage\DriverInterface;

abstract class AbstractDriver implements DriverInterface
{
    public function isValidKey(string $key): bool
    {
        if ('' === $key) {
            return false;
        }
        if (preg_match('/([^\pL\pN\pP\pS\pZ])|([\xC2\xA0])/u', $key)) {
            return false;
        }

        return true;
    }

    public function isValidValue(mixed $value): bool
    {
        $validTypes = ['string', 'int', 'float'];
        return in_array(gettype($value), $validTypes);
    }

}