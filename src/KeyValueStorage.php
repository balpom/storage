<?php

declare(strict_types=1);

namespace Balpom\Storage;

class KeyValueStorage extends AbstractStorage implements KeyValueStorageInterface
{
    public function isValidKey(string $key): bool
    {
        return $this->driver->isValidKey($key);
    }

    public function isValidValue(mixed $value): bool
    {
        return $this->driver->isValidValue($key);
    }

    /*
     * Return value by key.
     */
    public function value(string $key): string|false
    {
        $this->checkKey('value', $key);
        return $this->driver->value($key);
    }

    /*
     * Store value by key.
     */
    public function store(string $key, string $value): bool
    {
        $this->checkKey('store', $key);
        $this->checkValue('store', $value);
        return $this->driver->store($key, $value);
    }

    /*
     * Check key-value pair existence.
     */
    public function exists(string $key): bool
    {
        $this->checkKey('exist', $key);
        return $this->driver->exists($key);
    }

    /*
     * Delete key-value pair by key.
     */
    public function delete(string $key): bool
    {
        $this->checkKey('exist', $key);
        return $this->driver->delete($key);
    }

    protected function checkKey(string $method, string $key): void
    {
        if ('' === $key) {
            throw new StorageInvalidArgumentException('Empty key given in ' . $method . ' method!');
        }
        if (!$this->driver->isValidKey($key)) {
            throw new StorageInvalidArgumentException('Not valid key ' . $key . ' given in ' . $method . ' method!');
        }
    }

    protected function checkValue(string $method, mixed $value = null): void
    {
        if (null !== $value && !$this->driver->isValidValue($value)) {
            throw new StorageInvalidArgumentException('Not valid defaul value given in ' . $method . ' method!');
        }
    }

}