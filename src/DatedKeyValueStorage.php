<?php

declare(strict_types=1);

namespace Balpom\Storage;

class DatedKeyValueStorage extends KeyValueStorage implements TimeStorageInterface
{
    /*
     * Universal method for storing and getting time in Unix Time Stamp format.
     *
     * If $time is NULL, this method MUST return current time by $key.
     * Else this method store given time value for $key and return result
     * (TRUE or FALSE).
     */
    public function time(string $key, int|null $time = null): int|bool
    {
        $this->checkKey('value', $key);
        return $this->driver->time($key, $time);
    }

}