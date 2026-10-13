<?php

declare(strict_types=1);

namespace Balpom\Storage;

interface AbstractStorageInterface
{
    /*
     * Wipes clean the entire records.
     */
    public function clear(): bool;

    /*
     * Check key.
     */
    public function isValidKey(string $key): bool;

    /*
     * Check value.
     */
    public function isValidValue(mixed $value): bool;

}