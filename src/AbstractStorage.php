<?php

declare(strict_types=1);

namespace Balpom\Storage;

abstract class AbstractStorage implements AbstractStorageInterface
{
    protected DriverInterface $driver;

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    private function checkKey(string $method, string $key): void
    {
        if ('' === $key) {
            throw new InvalidArgumentException('Empty key given in ' . $method . ' method!');
        }
        if (!$this->isValidKey($key)) {
            throw new InvalidArgumentException('Not valid key ' . $key . ' given in ' . $method . ' method!');
        }
    }

    private function checkValue(string $method, mixed $value = null): void
    {
        if (null !== $value && !$this->isValidValue($value)) {
            throw new InvalidArgumentException('Not valid defaul value given in ' . $method . ' method!');
        }
    }

}