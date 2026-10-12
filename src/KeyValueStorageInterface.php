<?php

declare(strict_types=1);

namespace Balpom\Storage;

interface KeyValueStorageInterface extends AbstractStorageInterface
{
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