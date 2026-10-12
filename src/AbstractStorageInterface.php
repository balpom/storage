<?php

declare(strict_types=1);

namespace Balpom\Storage;

interface AbstractStorageInterface
{
    /*
     * Check key.
     */
    public function isValidKey(string $key): bool;

    /*
     * Check value.
     */
    public function isValidValue(mixed $value): bool;

}