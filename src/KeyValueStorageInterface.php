<?php

declare(strict_types=1);

namespace Balpom\Storage;

interface KeyValueStorageInterface extends AbstractStorageInterface
{
    /*
     * Return all keys from storage as ["key1", "key2", "key3", ...].
     *
     * If $keyValue = TRUE - return as ["key1"=>"value1", "key2"=>"value2", ...].
     */
    public function all(bool $keyValue = false): array|false;

    /*
     * Return value by key.
     */
    public function value(string $key): string|false;

    /*
     * Store value by key.
     */
    public function store(string $key, string $value): bool;

    /*
     * Check key-value pair existence.
     */
    public function exists(string $key): bool;

    /*
     * Delete key-value pair by key.
     */
    public function delete(string $key): bool;

}